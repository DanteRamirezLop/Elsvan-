<?php

namespace Tests\Feature;

use App\Jobs\SendLeadToSperant;
use App\Models\RealEstateProject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Queue;
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
            'mail.contact_to' => 'ventas@example.com',
        ]);
    }

    protected function quotePayload(): array
    {
        return [
            'proyecto' => 'torre-sol',
            'departamento' => 'Tipo A',
            'nombre' => 'Ana María Pérez',
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

        Queue::assertPushed(SendLeadToSperant::class, fn ($job) => $job->lead['first_name'] === 'Ana'
            && $job->lead['last_name'] === 'María Pérez'
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
            && $request->hasHeader('Authorization', 'Bearer secret-token')
            && $request['fname'] === 'Ana'
            && $request['document_type'] === 'DNI'
            && $request['project_id'] === '42'
            && $request['input_channel_id'] === '5');
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
