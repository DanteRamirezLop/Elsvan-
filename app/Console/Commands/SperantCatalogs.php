<?php

namespace App\Console\Commands;

use App\Services\SperantService;
use Illuminate\Console\Command;
use Throwable;

class SperantCatalogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sperant:catalogs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Muestra los IDs de proyectos, canales de entrada, medios de captación, niveles de interés y tipos de documento de Sperant';

    protected array $resources = [
        'projects' => 'Proyectos (sperant_project_id en Filament)',
        'input_channels' => 'Canales de entrada (SPERANT_INPUT_CHANNEL_ID)',
        'captation_ways' => 'Medios de captación (SPERANT_SOURCE_ID)',
        'interest_types' => 'Niveles de interés (SPERANT_INTEREST_TYPE_ID)',
        'document_types' => 'Tipos de documento (SPERANT_DOCUMENT_TYPE_*)',
    ];

    /**
     * Execute the console command.
     */
    public function handle(SperantService $sperant): int
    {
        if (blank(config('services.sperant.token'))) {
            $this->error('Falta SPERANT_TOKEN en el .env');

            return self::FAILURE;
        }

        foreach ($this->resources as $resource => $title) {
            $this->newLine();
            $this->info($title);

            try {
                $rows = collect($sperant->list($resource, ['per_page' => 100]))
                    ->map(fn ($item) => [
                        $item['attributes']['id'] ?? $item['id'],
                        $item['attributes']['name'] ?? '',
                        $item['attributes']['code'] ?? $item['attributes']['slug'] ?? '',
                    ]);

                $this->table(['ID', 'Nombre', 'Código'], $rows);
            } catch (Throwable $e) {
                $this->error('Error al consultar '.$resource.': '.$e->getMessage());
            }
        }

        return self::SUCCESS;
    }
}
