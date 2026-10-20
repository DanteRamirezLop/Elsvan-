<?php

namespace Tests\Feature;

use App\Filament\Pages\SperantSettings;
use App\Models\SperantSetting;
use App\Models\User;
use App\Services\SperantService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class SperantSettingsPageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'services.sperant.enabled' => false,
            'services.sperant.url' => 'https://sperant.test',
            'services.sperant.token' => 'env-token',
            'services.sperant.clients_endpoint' => '/v3/clients',
            'services.sperant.input_channel_id' => '44',
            'services.sperant.source_id' => '87',
            'services.sperant.interest_type_id' => '15',
            'services.sperant.default_project_id' => '570',
        ]);

        $this->actingAs(User::factory()->create());
    }

    protected function validForm(): array
    {
        return [
            'enabled' => true,
            'url' => 'https://api.sperant.com',
            'clients_endpoint' => '/v3/clients',
            'token' => 'nuevo-token',
            'input_channel_id' => 44,
            'source_id' => 87,
            'interest_type_id' => 15,
            'default_project_id' => 570,
            'google_ads_source_id' => 90,
            'google_ads_input_channel_id' => null,
        ];
    }

    public function test_page_shows_current_env_values_without_exposing_the_token(): void
    {
        Livewire::test(SperantSettings::class)
            ->assertSchemaStateSet([
                'url' => 'https://sperant.test',
                'source_id' => '87',
                'default_project_id' => '570',
                'token' => null,
            ]);
    }

    public function test_saving_stores_settings_and_encrypts_the_token(): void
    {
        Livewire::test(SperantSettings::class)
            ->fillForm($this->validForm())
            ->call('save')
            ->assertHasNoFormErrors();

        $setting = SperantSetting::first();

        $this->assertTrue($setting->enabled);
        $this->assertSame('nuevo-token', $setting->token);
        $this->assertSame(90, (int) $setting->google_ads_source_id);
        $this->assertNotSame('nuevo-token', $setting->getRawOriginal('token'));
    }

    public function test_empty_token_keeps_the_saved_one(): void
    {
        SperantSetting::create(['token' => 'token-guardado']);

        Livewire::test(SperantSettings::class)
            ->fillForm([...$this->validForm(), 'token' => ''])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertSame('token-guardado', SperantSetting::first()->token);
    }

    public function test_required_ids_are_validated(): void
    {
        Livewire::test(SperantSettings::class)
            ->fillForm([...$this->validForm(), 'source_id' => null, 'url' => 'no-es-url'])
            ->call('save')
            ->assertHasFormErrors(['source_id' => 'required', 'url' => 'url']);
    }

    public function test_service_prefers_admin_settings_over_env(): void
    {
        SperantSetting::create([
            'enabled' => true,
            'url' => 'https://admin.sperant.test',
            'token' => 'admin-token',
            'source_id' => 99,
        ]);
        Http::fake(['admin.sperant.test/*' => Http::response(['id' => 1], 201)]);

        $sperant = app(SperantService::class);
        $this->assertTrue($sperant->isEnabled());

        $sperant->createClient(['first_name' => 'Ana', 'email' => 'ana@example.com', 'phone' => '999', 'origin' => 'Web - Contáctanos']);

        // Los campos vacíos en el administrador usan el .env
        Http::assertSent(fn (Request $request) => $request->url() === 'https://admin.sperant.test/v3/clients'
            && $request->hasHeader('Authorization', 'admin-token')
            && $request['source_id'] === 99
            && $request['input_channel_id'] === 44
            && $request['project_id'] === 570);
    }
}
