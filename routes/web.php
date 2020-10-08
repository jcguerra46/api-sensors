<?php

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

/** Points Routes */
$router->group(['prefix' => 'sensors'], function () use ($router) {
    $router->get('/', 'SensorsController@index');
    $router->post('/', 'SensorsController@store');
    $router->get('/{id}', 'SensorsController@show');
    $router->put('/{id}', 'SensorsController@update');
    $router->delete('/{id}', 'SensorsController@destroy');

    $router->get('/{id}/nearby', 'SensorsController@getNearbySensors');
});
