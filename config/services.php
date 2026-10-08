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
        'timeout' => env('SPERANT_TIMEOUT', 15),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
