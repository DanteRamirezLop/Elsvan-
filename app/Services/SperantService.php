<?php

namespace App\Services;

use App\Models\RealEstateProject;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class SperantService
{
    /**
     * Códigos de tipo de documento del formulario => valor que espera Sperant.
     * Confirmar con la documentación de Sperant.
     */
    protected const DOCUMENT_TYPES = [
        'dni' => 'DNI',
        'ce' => 'CE',
        'pasaporte' => 'PASAPORTE',
    ];

    public function isEnabled(): bool
    {
        return (bool) config('services.sperant.enabled') && filled(config('services.sperant.token'));
    }

    /**
     * Registra un lead como cliente en Sperant.
     *
     * @param  array{first_name: string, last_name?: string|null, email: string, phone: string, document_type?: string|null, document_number?: string|null, project?: string|null, unit?: string|null, message?: string|null, origin: string}  $lead
     */
    public function createClient(array $lead): Response
    {
        return $this->client()
            ->post(config('services.sperant.clients_endpoint'), $this->mapLead($lead))
            ->throw();
    }

    /**
     * Convierte el lead del formulario al formato de la API de Sperant.
     * Los nombres de los campos deben confirmarse con la documentación de Sperant.
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

        return array_filter([
            'fname' => $lead['first_name'],
            'lname' => $lead['last_name'] ?? null,
            'email' => $lead['email'],
            'phone' => $lead['phone'],
            'document_type' => self::DOCUMENT_TYPES[$lead['document_type'] ?? ''] ?? null,
            'document' => $lead['document_number'] ?? null,
            'project_id' => $project?->sperant_project_id,
            'input_channel_id' => config('services.sperant.input_channel_id'),
            'source_id' => config('services.sperant.source_id'),
            'observation' => $observation,
        ], fn ($value) => filled($value));
    }

    protected function client(): PendingRequest
    {
        return Http::baseUrl(config('services.sperant.url'))
            ->withToken(config('services.sperant.token'))
            ->acceptJson()
            ->asJson()
            ->timeout((int) config('services.sperant.timeout'));
    }
}
