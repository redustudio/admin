<?php

$router->get('/login', ['as' => 'reduvel-admin:login', 'uses' => 'Auth\LoginController@showLoginForm']);
$router->post('/login', ['as' => 'reduvel-admin:login', 'uses' => 'Auth\LoginController@login']);
$router->get('/logout', ['as' => 'reduvel-admin:logout', 'uses' => 'Auth\LoginController@logout']);

$router->group(['middleware' => ['auth']], function ($router) {
    $router->get(config('reduvel.admin.route.web.index'), [
        'as' => 'reduvel-admin:index',
        'uses' => 'Controller@index'
    ]);
});
