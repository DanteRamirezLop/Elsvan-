<?php

namespace App\Jobs;

use App\Services\SperantService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
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

        $response = $sperant->createClient($this->lead);

        Log::info('Lead enviado a Sperant', [
            'email' => $this->lead['email'],
            'origin' => $this->lead['origin'],
            'status' => $response->status(),
        ]);
    }

    public function failed(?Throwable $exception): void
    {
        Log::error('No se pudo enviar el lead a Sperant: '.$exception?->getMessage(), [
            'lead' => $this->lead,
        ]);
    }
}
