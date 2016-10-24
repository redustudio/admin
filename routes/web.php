<?php

$router->get('/login', 'Auth\LoginController@showLoginForm');
$router->get('/logout', 'Auth\LoginController@logout');

$router->group(['middleware' => ['web', 'auth']], function ($router) {
    $router->get(config('reduvel.admin.route.web.index'), 'Controller@index');
});
