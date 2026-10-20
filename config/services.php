<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sperant' => [
        'enabled' => env('SPERANT_ENABLED', false),
        'url' => env('SPERANT_URL', 'https://api.sperant.com'),
        'token' => env('SPERANT_TOKEN'),
        'clients_endpoint' => env('SPERANT_CLIENTS_ENDPOINT', '/v3/clients'),
        'input_channel_id' => env('SPERANT_INPUT_CHANNEL_ID'),
        'source_id' => env('SPERANT_SOURCE_ID'),
        'interest_type_id' => env('SPERANT_INTEREST_TYPE_ID'),
        // Medio de captación / canal de entrada para leads de campañas pagadas (vacío = usa los de arriba)
        'google_ads_source_id' => env('SPERANT_GOOGLE_ADS_SOURCE_ID'),
        'google_ads_input_channel_id' => env('SPERANT_GOOGLE_ADS_INPUT_CHANNEL_ID'),
        'facebook_ads_source_id' => env('SPERANT_FACEBOOK_ADS_SOURCE_ID'),
        'instagram_ads_source_id' => env('SPERANT_INSTAGRAM_ADS_SOURCE_ID'),
        'meta_ads_input_channel_id' => env('SPERANT_META_ADS_INPUT_CHANNEL_ID'),
        // Proyecto usado cuando el lead no trae proyecto (Contáctanos) o el proyecto no tiene ID de Sperant
        'default_project_id' => env('SPERANT_DEFAULT_PROJECT_ID'),
        // Tipo de documento del formulario => document_type_id en Sperant (ver: php artisan sperant:catalogs)
        'document_types' => [
            'dni' => env('SPERANT_DOCUMENT_TYPE_DNI', 1),
            'ce' => env('SPERANT_DOCUMENT_TYPE_CE', 2),
            'pasaporte' => env('SPERANT_DOCUMENT_TYPE_PASAPORTE', 4),
        ],
        'timeout' => env('SPERANT_TIMEOUT', 15),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
