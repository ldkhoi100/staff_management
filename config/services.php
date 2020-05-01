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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '2867768813312952',
        'client_secret' => 'dbd0c1a50aa910c86712493201ad890d',
        'redirect' => 'https://dollashop.herokuapp.com/callback/facebook',
    ],
    'google' => [
        'client_id' => '72252392541-s53s7bpil3j8gubgrtofbhniqhb34h79.apps.googleusercontent.com',
        'client_secret' => 'vycRa_hVOuGSROZplsi2Dj5q',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
    ],

];