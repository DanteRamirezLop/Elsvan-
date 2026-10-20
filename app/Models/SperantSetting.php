<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Configuración de la integración con Sperant editable desde Filament (una sola fila).
 * Los campos vacíos usan el valor del .env (config/services.php).
 */
class SperantSetting extends Model
{
    public const KEYS = [
        'enabled',
        'url',
        'token',
        'clients_endpoint',
        'input_channel_id',
        'source_id',
        'interest_type_id',
        'default_project_id',
        'google_ads_source_id',
        'google_ads_input_channel_id',
        'facebook_ads_source_id',
        'instagram_ads_source_id',
        'meta_ads_input_channel_id',
    ];

    protected $fillable = self::KEYS;

    protected $hidden = ['token'];

    protected function casts(): array
    {
        return [
            'enabled' => 'boolean',
            'token' => 'encrypted',
        ];
    }
}
