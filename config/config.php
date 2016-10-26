<?php
use App\User;

return [
    'route' => [
        // automatic loading of routes through main service provider
        'enabled' => true,

        'web' => [
            'index' => '/dashboard',
            'middlewares' => ['web']
        ]
    ],

    'user' => [
        // for create user root 
        'model' => User::class
    ]
];
