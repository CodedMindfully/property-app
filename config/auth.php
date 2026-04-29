<?php

use App\Models\User;

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This default guard is what Laravel uses if you just call Auth::check()
    | without specifying a guard. We'll keep it as 'web'.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | We have combined your Admin guard and the default Web guard here.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins', // Corrected spelling from 'privider'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | We have combined your Admin provider (pointing to Admin model)
    | and the User provider (pointing to User model) here.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            // Look in the .env file for a variable called AUTH_MODEl
            // if you don't find one use the User class
            'model' => env('AUTH_MODEL', User::class),
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];