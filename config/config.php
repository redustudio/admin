<?php
use App\User;

return [
    // automatic loading of routes through main service provider
    'routes' => true,

    'user' => [
        'model' => User::class
    ]
];
