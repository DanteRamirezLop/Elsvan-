<?php

namespace App\Services;

use App\Models\RealEstateProject;
use App\Models\SperantSetting;
use App\Support\TrafficSource;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

/**
 * Cliente de la API v3 de Sperant.
 *
 * @see https://sperant.gitbook.io/apiv3
 */
class SperantService
{
    protected ?array $settings = null;

    public function isEnabled(): bool
    {
        return (bool) $this->setting('enabled') && filled($this->setting('token'));
    }

    /**
     * Valor configurado en el administrador (Filament) o, si está vacío, el del .env.
     */
    public function setting(string $key): mixed
    {
        // Se lee una vez por instancia: cada job recibe una instancia nueva, así el
        // queue worker toma los cambios del administrador sin reiniciarse
        $this->settings ??= rescue(
            fn () => SperantSetting::query()->first()?->only(SperantSetting::KEYS) ?? [],
            [],
            report: false,
        );

        $value = $this->settings[$key] ?? null;

        return filled($value) ? $value : config('services.sperant.'.$key);
    }

    /**
     * Verifica que la URL y el token sean válidos.
     */
    public function testConnection(): Response
    {
        return $this->client()->get('/v3/interest_types')->throw();
    }

    /**
     * Registra un lead como cliente en Sperant. Si ya existe un lead con el mismo
     * documento, email o celular, Sperant lo actualiza en lugar de duplicarlo.
     *
     * @param  array{first_name: string, last_name?: string|null, email: string, phone: string, document_type?: string|null, document_number?: string|null, project?: string|null, unit?: string|null, message?: string|null, consent?: bool, origin: string, tracking?: array<string, string>}  $lead
     */
    public function createClient(array $lead): Response
    {
        return $this->client()
            ->post($this->setting('clients_endpoint'), $this->mapLead($lead))
            ->throw();
    }

    /**
     * Lista un recurso de la API (projects, input_channels, captation_ways, interest_types, document_types...).
     */
    public function list(string $resource, array $query = []): array
    {
        $items = [];
        $page = 1;

        // La API pagina de 20 en 20; se recorren todas las páginas
        do {
            $response = $this->client()
                ->get('/v3/'.$resource, $query + ['page' => $page])
                ->throw();

            $items = array_merge($items, $response->json('data', []));
            $page++;
        } while ($response->json('links.next') && $page <= 50);

        return $items;
    }

    /**
     * Convierte el lead del formulario al formato de "Crear Cliente" de Sperant.
     */
    public function mapLead(array $lead): array
    {
        $project = filled($lead['project'] ?? null)
            ? RealEstateProject::where('slug', $lead['project'])->first()
            : null;

        $tracking = $lead['tracking'] ?? [];
        $traffic = TrafficSource::fromTracking($tracking);

        $clickId = collect(['gclid', 'gbraid', 'wbraid', 'fbclid'])
            ->filter(fn ($key) => filled($tracking[$key] ?? null))
            ->map(fn ($key) => $key.': '.$tracking[$key])
            ->first();

        $observation = collect([
            'Origen: '.$lead['origin'],
            'Tráfico: '.$traffic->label.(filled($tracking['utm_campaign'] ?? null) ? ' - '.$tracking['utm_campaign'] : ''),
            $clickId ? 'ID de clic '.$clickId : null,
            filled($lead['project'] ?? null) ? 'Proyecto: '.($project?->name ?? $lead['project']) : null,
            filled($lead['unit'] ?? null) ? 'Departamento/plano: '.$lead['unit'] : null,
            filled($lead['message'] ?? null) ? 'Mensaje: '.$lead['message'] : null,
        ])->filter()->implode("\n");

        $documentTypeId = config('services.sperant.document_types.'.($lead['document_type'] ?? ''));

        // Sperant exige project_id
        $projectId = $project?->sperant_project_id ?: $this->setting('default_project_id');

        $sourceId = $this->channelSetting($traffic, 'source_id');
        $inputChannelId = $this->channelSetting($traffic, 'input_channel_id');

        return array_filter([
            'fname' => $lead['first_name'],
            'lname' => $lead['last_name'] ?? null,
            'email' => $lead['email'],
            'phone' => $lead['phone'],
            'document_type_id' => filled($documentTypeId) ? (int) $documentTypeId : null,
            'document' => $lead['document_number'] ?? null,
            'project_id' => filled($projectId) ? (int) $projectId : null,
            'input_channel_id' => (int) $inputChannelId,
            'source_id' => (int) $sourceId,
            'interest_type_id' => (int) $this->setting('interest_type_id'),
            'utm_source' => $traffic->source,
            'utm_medium' => $traffic->medium,
            'utm_campaign' => $tracking['utm_campaign'] ?? $lead['origin'],
            'utm_term' => $tracking['utm_term'] ?? null,
            'utm_content' => $tracking['utm_content'] ?? null,
            'email_consent' => $lead['consent'] ?? null,
            'observation' => $observation,
        ], fn ($value) => $value !== null && $value !== '');
    }

    /**
     * Medio de captación / canal de entrada según el tipo de tráfico; si no hay uno
     * específico configurado, se usa el valor por defecto.
     */
    protected function channelSetting(TrafficSource $traffic, string $field): mixed
    {
        $candidates = [
            TrafficSource::GOOGLE_ADS => [
                'source_id' => ['google_ads_source_id'],
                'input_channel_id' => ['google_ads_input_channel_id'],
            ],
            TrafficSource::FACEBOOK_ADS => [
                'source_id' => ['facebook_ads_source_id'],
                'input_channel_id' => ['meta_ads_input_channel_id'],
            ],
            TrafficSource::INSTAGRAM_ADS => [
                'source_id' => ['instagram_ads_source_id', 'facebook_ads_source_id'],
                'input_channel_id' => ['meta_ads_input_channel_id'],
            ],
        ][$traffic->channel][$field] ?? [];

        foreach ([...$candidates, $field] as $key) {
            if (filled($value = $this->setting($key))) {
                return $value;
            }
        }

        return null;
    }

    protected function client(): PendingRequest
    {
        return Http::baseUrl($this->setting('url'))
            ->withHeaders(['Authorization' => $this->setting('token')])
            ->acceptJson()
            ->asJson()
            ->timeout((int) config('services.sperant.timeout'));
    }
}
