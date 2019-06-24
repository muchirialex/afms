<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [  //can be changed to any provider
        'client_id' => '2161937937386416',
        'client_secret' => '2c6890379fe74134deaa6a0d78424309',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'google' => [  //can be changed to any provider
        'client_id' => '33502913715-v2cgh5mn3c5q0qviopphrkmi59a0t9ao.apps.googleusercontent.com',
        'client_secret' => 'xnBP9jzMxlM3cAWGJUBNbs3G',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

];
