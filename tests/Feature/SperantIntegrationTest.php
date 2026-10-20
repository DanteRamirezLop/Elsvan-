<?php

namespace Tests\Feature;

use App\Http\Middleware\CaptureUtmParameters;
use App\Jobs\SendLeadToSperant;
use App\Models\RealEstateProject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class SperantIntegrationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'services.sperant.enabled' => true,
            'services.sperant.url' => 'https://sperant.test',
            'services.sperant.token' => 'secret-token',
            'services.sperant.clients_endpoint' => '/v3/clients',
            'services.sperant.input_channel_id' => '5',
            'services.sperant.source_id' => '7',
            'services.sperant.interest_type_id' => '4',
            'mail.contact_to' => 'ventas@example.com',
        ]);
    }

    protected function quotePayload(): array
    {
        return [
            'proyecto' => 'torre-sol',
            'departamento' => 'Tipo A',
            'nombre' => 'Ana María',
            'apellidos' => 'Pérez Gómez',
            'celular' => '999888777',
            'tipo_documento' => 'dni',
            'numero_documento' => '12345678',
            'email' => 'ana@example.com',
            'mensaje' => 'Quiero información',
            'terminos' => '1',
        ];
    }

    public function test_quote_form_dispatches_lead_to_sperant(): void
    {
        Queue::fake();

        $this->postJson(route('quote.send'), $this->quotePayload())
            ->assertJson(['status' => true]);

        Queue::assertPushed(SendLeadToSperant::class, fn ($job) => $job->lead['first_name'] === 'Ana María'
            && $job->lead['last_name'] === 'Pérez Gómez'
            && $job->lead['project'] === 'torre-sol');
    }

    public function test_job_sends_mapped_client_to_sperant(): void
    {
        Http::fake(['sperant.test/*' => Http::response(['id' => 1], 201)]);

        RealEstateProject::create([
            'name' => 'Torre Sol',
            'slug' => 'torre-sol',
            'status' => 'published',
            'sperant_project_id' => '42',
        ]);

        $this->postJson(route('quote.send'), $this->quotePayload())
            ->assertJson(['status' => true]);

        Http::assertSent(fn (Request $request) => $request->url() === 'https://sperant.test/v3/clients'
            && $request->hasHeader('Authorization', 'secret-token')
            && $request['fname'] === 'Ana María'
            && $request['lname'] === 'Pérez Gómez'
            && $request['document_type_id'] === 1
            && $request['document'] === '12345678'
            && $request['project_id'] === 42
            && $request['input_channel_id'] === 5
            && $request['source_id'] === 7
            && $request['interest_type_id'] === 4
            && $request['email_consent'] === true);
    }

    public function test_contact_form_uses_default_project(): void
    {
        config(['services.sperant.default_project_id' => '99']);
        Http::fake(['sperant.test/*' => Http::response(['data' => ['id' => '1']], 200)]);

        $this->postJson(route('contactanos.send'), [
            'nombres' => 'Luis',
            'apellidos' => 'Ramos',
            'celular' => '999111222',
            'correo' => 'luis@example.com',
            'solicitud' => 'Hola',
        ])->assertJson(['status' => true]);

        Http::assertSent(fn (Request $request) => $request['project_id'] === 99
            && $request['fname'] === 'Luis');
    }

    public function test_landing_with_utms_stores_them_in_a_cookie(): void
    {
        Route::middleware('web')->get('/_utm-landing', fn () => 'ok');

        $this->get('/_utm-landing?utm_source=google&utm_medium=cpc&utm_campaign=torre-sol&foo=bar')
            ->assertCookie(CaptureUtmParameters::COOKIE, json_encode([
                'utm_source' => 'google',
                'utm_medium' => 'cpc',
                'utm_campaign' => 'torre-sol',
            ]));
    }

    public function test_organic_referrer_is_stored(): void
    {
        Route::middleware('web')->get('/_utm-landing', fn () => 'ok');

        $this->withHeader('Referer', 'https://www.google.com.pe/')
            ->get('/_utm-landing')
            ->assertCookie(CaptureUtmParameters::COOKIE, json_encode(['referrer' => 'google.com.pe']));
    }

    public function test_organic_visit_does_not_replace_a_previous_campaign(): void
    {
        Route::middleware('web')->get('/_utm-landing', fn () => 'ok');

        $this->withHeader('Referer', 'https://www.google.com.pe/')
            ->withCookie(CaptureUtmParameters::COOKIE, json_encode(['utm_source' => 'ig', 'utm_medium' => 'paid_social']))
            ->get('/_utm-landing')
            ->assertCookieMissing(CaptureUtmParameters::COOKIE);
    }

    public function test_internal_navigation_is_not_stored_as_referrer(): void
    {
        Route::middleware('web')->get('/_utm-landing', fn () => 'ok');

        $this->withHeader('Referer', url('/proyectos'))
            ->get('/_utm-landing')
            ->assertCookieMissing(CaptureUtmParameters::COOKIE);
    }

    public function test_campaign_visit_replaces_previous_origin(): void
    {
        Route::middleware('web')->get('/_utm-landing', fn () => 'ok');

        $this->withHeader('Referer', 'https://l.instagram.com/')
            ->withCookie(CaptureUtmParameters::COOKIE, json_encode(['referrer' => 'google.com']))
            ->get('/_utm-landing?utm_source=ig&utm_medium=paid_social&utm_campaign=torre-sol')
            ->assertCookie(CaptureUtmParameters::COOKIE, json_encode([
                'utm_source' => 'ig',
                'utm_medium' => 'paid_social',
                'utm_campaign' => 'torre-sol',
                'referrer' => 'l.instagram.com',
            ]));
    }

    public function test_instagram_ads_leads_use_meta_captation_way(): void
    {
        config([
            'services.sperant.facebook_ads_source_id' => '20',
            'services.sperant.meta_ads_input_channel_id' => '9',
        ]);
        Http::fake(['sperant.test/*' => Http::response(['id' => 1], 201)]);

        $this->withCredentials()->withCookie(CaptureUtmParameters::COOKIE, json_encode([
            'utm_source' => 'ig',
            'utm_medium' => 'paid_social',
            'utm_campaign' => 'torre-sol',
        ]))->postJson(route('quote.send'), $this->quotePayload())
            ->assertJson(['status' => true]);

        // Sin ID propio de Instagram se usa el de Facebook
        Http::assertSent(fn (Request $request) => $request['source_id'] === 20
            && $request['input_channel_id'] === 9
            && $request['utm_source'] === 'ig'
            && str_contains($request['observation'], 'Tráfico: Instagram Ads - torre-sol'));
    }

    public function test_organic_search_lead_is_sent_as_organic(): void
    {
        config(['services.sperant.google_ads_source_id' => '12']);
        Http::fake(['sperant.test/*' => Http::response(['id' => 1], 201)]);

        $this->withCredentials()->withCookie(CaptureUtmParameters::COOKIE, json_encode(['referrer' => 'google.com.pe']))
            ->postJson(route('quote.send'), $this->quotePayload())
            ->assertJson(['status' => true]);

        Http::assertSent(fn (Request $request) => $request['utm_source'] === 'google'
            && $request['utm_medium'] === 'organic'
            && $request['source_id'] === 7
            && str_contains($request['observation'], 'Tráfico: Orgánico - Búsqueda en Google'));
    }

    public function test_stored_utms_are_sent_to_sperant(): void
    {
        Http::fake(['sperant.test/*' => Http::response(['id' => 1], 201)]);

        $this->withCredentials()->withCookie(CaptureUtmParameters::COOKIE, json_encode([
            'utm_source' => 'google',
            'utm_medium' => 'cpc',
            'utm_campaign' => 'lanzamiento-torre-sol',
            'utm_term' => 'departamentos en lima',
            'utm_content' => 'anuncio-a',
        ]))->postJson(route('quote.send'), $this->quotePayload())
            ->assertJson(['status' => true]);

        Http::assertSent(fn (Request $request) => $request['utm_source'] === 'google'
            && $request['utm_medium'] === 'cpc'
            && $request['utm_campaign'] === 'lanzamiento-torre-sol'
            && $request['utm_term'] === 'departamentos en lima'
            && $request['utm_content'] === 'anuncio-a');
    }

    public function test_gclid_without_utms_is_attributed_to_google_ads(): void
    {
        Http::fake(['sperant.test/*' => Http::response(['id' => 1], 201)]);

        $this->withCredentials()->withCookie(CaptureUtmParameters::COOKIE, json_encode(['gclid' => 'abc123']))
            ->postJson(route('quote.send'), $this->quotePayload())
            ->assertJson(['status' => true]);

        Http::assertSent(fn (Request $request) => $request['utm_source'] === 'google'
            && $request['utm_medium'] === 'cpc'
            && $request['utm_campaign'] === 'Web - Cotizar'
            && str_contains($request['observation'], 'ID de clic gclid: abc123'));
    }

    public function test_google_ads_leads_use_their_own_captation_way(): void
    {
        config([
            'services.sperant.google_ads_source_id' => '12',
            'services.sperant.google_ads_input_channel_id' => '8',
        ]);
        Http::fake(['sperant.test/*' => Http::response(['id' => 1], 201)]);

        $this->withCredentials()->withCookie(CaptureUtmParameters::COOKIE, json_encode([
            'utm_source' => 'google',
            'utm_medium' => 'cpc',
            'utm_campaign' => 'torre-sol',
        ]))->postJson(route('quote.send'), $this->quotePayload())
            ->assertJson(['status' => true]);

        Http::assertSent(fn (Request $request) => $request['source_id'] === 12
            && $request['input_channel_id'] === 8
            && str_contains($request['observation'], 'Tráfico: Google Ads - torre-sol'));
    }

    public function test_organic_leads_keep_the_default_captation_way(): void
    {
        config(['services.sperant.google_ads_source_id' => '12']);
        Http::fake(['sperant.test/*' => Http::response(['id' => 1], 201)]);

        $this->withCredentials()->withCookie(CaptureUtmParameters::COOKIE, json_encode([
            'utm_source' => 'facebook',
            'utm_medium' => 'social',
        ]))->postJson(route('quote.send'), $this->quotePayload())
            ->assertJson(['status' => true]);

        Http::assertSent(fn (Request $request) => $request['source_id'] === 7
            && $request['input_channel_id'] === 5);
    }

    public function test_visit_without_origin_is_sent_as_direct(): void
    {
        Http::fake(['sperant.test/*' => Http::response(['id' => 1], 201)]);

        $this->postJson(route('quote.send'), $this->quotePayload())
            ->assertJson(['status' => true]);

        Http::assertSent(fn (Request $request) => $request['utm_source'] === 'direct'
            && $request['utm_medium'] === 'none'
            && $request['utm_campaign'] === 'Web - Cotizar'
            && ! isset($request['utm_term']));
    }

    public function test_validation_error_is_not_retried(): void
    {
        Http::fake(['sperant.test/*' => Http::response(['errors' => [['msg' => 'project_id es requerido']]], 400)]);

        $this->postJson(route('quote.send'), $this->quotePayload())
            ->assertJson(['status' => true]);

        Http::assertSentCount(1);
    }

    public function test_job_does_nothing_when_integration_is_disabled(): void
    {
        config(['services.sperant.enabled' => false]);
        Http::fake();

        $this->postJson(route('quote.send'), $this->quotePayload())
            ->assertJson(['status' => true]);

        Http::assertNothingSent();
    }
}
