<?php

/** @var \Laravel\Lumen\Routing\Router $router */
/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It is a breeze. Simply tell Lumen the URIs it should respond to
  | and give it the Closure to call when that URI is requested.
  |
 */

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/key', function () {
    return \Illuminate\Support\Str::random(32);
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/login', 'AuthController@login');
    $router->post('/register', 'AuthController@register');

    /**functions to notes */
    $router->post('/nota', 'NotaController@create');
    $router->get('/nota/{id}', 'NotaController@read');
    $router->put('/nota/{id}', 'NotaController@update');

    $router->group(['middleware' => 'auth'], function () use ($router) {        
        $router->post('/logout', 'AuthController@logout');
    });
});
