<?php

use Filament\Pages;
use Filament\Widgets;

return [

    'id' => 'admin',

    'path' => 'admin',

    'domain' => null,

    'middleware' => [
        'web',
        \Filament\Http\Middleware\Authenticate::class,
    ],

    'auth' => [
        'guard' => 'admin',

        'pages' => [
            'login' => Pages\Auth\Login::class,
        ],
    ],

    'branding' => [
        'brand' => env('APP_NAME', 'Filament'),
    ],

    'resources' => [
        // Tambahkan resource di sini jika sudah ada
    ],

    'pages' => [
        // Tambahkan custom page di sini jika perlu
    ],

    'widgets' => [
        // Tambahkan custom widget di sini jika perlu
    ],
];
