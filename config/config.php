<?php
use App\User;

return [
    // automatic loading of routes through main service provider
    'route' => [
        'enabled' => true,

        'web' => [
            'index' => '/dashboard',
            'middlewares' => ['web']
        ]
    ],

    'user' => [
        'model' => User::class
    ],

    'providers' => [
        Lavary\Menu\ServiceProvider::class
    ]
];
