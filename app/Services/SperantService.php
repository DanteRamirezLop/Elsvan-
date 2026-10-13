<?php

namespace App\Services;

use App\Models\RealEstateProject;
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
    public function isEnabled(): bool
    {
        return (bool) config('services.sperant.enabled') && filled(config('services.sperant.token'));
    }

    /**
     * Registra un lead como cliente en Sperant. Si ya existe un lead con el mismo
     * documento, email o celular, Sperant lo actualiza en lugar de duplicarlo.
     *
     * @param  array{first_name: string, last_name?: string|null, email: string, phone: string, document_type?: string|null, document_number?: string|null, project?: string|null, unit?: string|null, message?: string|null, consent?: bool, origin: string}  $lead
     */
    public function createClient(array $lead): Response
    {
        return $this->client()
            ->post(config('services.sperant.clients_endpoint'), $this->mapLead($lead))
            ->throw();
    }

    /**
     * Lista un recurso de la API (projects, input_channels, captation_ways, interest_types, document_types...).
     */
    public function list(string $resource, array $query = []): array
    {
        return $this->client()
            ->get('/v3/'.$resource, $query)
            ->throw()
            ->json('data', []);
    }

    /**
     * Convierte el lead del formulario al formato de "Crear Cliente" de Sperant.
     */
    public function mapLead(array $lead): array
    {
        $project = filled($lead['project'] ?? null)
            ? RealEstateProject::where('slug', $lead['project'])->first()
            : null;

        $observation = collect([
            'Origen: '.$lead['origin'],
            filled($lead['project'] ?? null) ? 'Proyecto: '.($project?->name ?? $lead['project']) : null,
            filled($lead['unit'] ?? null) ? 'Departamento/plano: '.$lead['unit'] : null,
            filled($lead['message'] ?? null) ? 'Mensaje: '.$lead['message'] : null,
        ])->filter()->implode("\n");

        $documentTypeId = config('services.sperant.document_types.'.($lead['document_type'] ?? ''));

        return array_filter([
            'fname' => $lead['first_name'],
            'lname' => $lead['last_name'] ?? null,
            'email' => $lead['email'],
            'phone' => $lead['phone'],
            'document_type_id' => filled($documentTypeId) ? (int) $documentTypeId : null,
            'document' => $lead['document_number'] ?? null,
            'project_id' => filled($project?->sperant_project_id) ? (int) $project->sperant_project_id : null,
            'input_channel_id' => (int) config('services.sperant.input_channel_id'),
            'source_id' => (int) config('services.sperant.source_id'),
            'interest_type_id' => (int) config('services.sperant.interest_type_id'),
            'utm_source' => 'web',
            'utm_medium' => 'formulario',
            'utm_campaign' => $lead['origin'],
            'email_consent' => $lead['consent'] ?? null,
            'observation' => $observation,
        ], fn ($value) => $value !== null && $value !== '');
    }

    protected function client(): PendingRequest
    {
        return Http::baseUrl(config('services.sperant.url'))
            ->withHeaders(['Authorization' => config('services.sperant.token')])
            ->acceptJson()
            ->asJson()
            ->timeout((int) config('services.sperant.timeout'));
    }
}
