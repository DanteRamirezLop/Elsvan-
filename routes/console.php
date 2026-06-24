<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// GENERATE SITEMAP
Schedule::command('sitemap:generate');
Schedule::call(function() {
    // Tarea a ejecutar declarada directamente en el método
    Log::info("GENERATE SITEMAP: ".now());
  })->dailyAt('00:00');
