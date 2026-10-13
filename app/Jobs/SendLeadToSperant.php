<?php

namespace App\Jobs;

use App\Services\SperantService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Log;
use Throwable;

class SendLeadToSperant implements ShouldQueue
{
    use Queueable;

    public int $tries = 3;

    /**
     * Segundos de espera entre reintentos.
     */
    public array $backoff = [60, 300];

    public function __construct(public array $lead) {}

    public function handle(SperantService $sperant): void
    {
        if (! $sperant->isEnabled()) {
            return;
        }

        try {
            $response = $sperant->createClient($this->lead);
        } catch (RequestException $e) {
            // Errores de validación (4xx) no se corrigen reintentando; sí los 429 y 5xx
            if ($e->response->clientError() && $e->response->status() !== 429) {
                $this->fail($e);

                return;
            }

            throw $e;
        }

        Log::info('Lead enviado a Sperant', [
            'email' => $this->lead['email'],
            'origin' => $this->lead['origin'],
            'status' => $response->status(),
            'client_id' => $response->json('data.id'),
        ]);
    }

    public function failed(?Throwable $exception): void
    {
        Log::error('No se pudo enviar el lead a Sperant: '.$exception?->getMessage(), [
            'response' => $exception instanceof RequestException ? $exception->response->json() : null,
            'lead' => $this->lead,
        ]);
    }
}
