<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// COLA (envío de leads a Sperant): en cPanel no hay worker permanente,
// así que se procesa cada minuto desde el cron de schedule:run
Schedule::command('queue:work --stop-when-empty --max-time=50 --tries=3')
    ->everyMinute()
    ->withoutOverlapping();

// GENERATE SITEMAP
Schedule::command('sitemap:generate');
Schedule::call(function() {
    // Tarea a ejecutar declarada directamente en el método
    Log::info("GENERATE SITEMAP: ".now());
  })->dailyAt('00:00');
