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

$router->get('/Anime', 'AnimeControllers@index');
$router->post('/Anime', 'AnimeControllers@create');
$router->put('/Anime/{id}', 'AnimeControllers@update');
$router->delete('/Anime/{id}', 'AnimeControllers@delete');
$router->get('/Studio', 'StudioControllers@index');
$router->post('/Studio', 'StudioControllers@create');
$router->put('/Studio/{id}', 'StudioControllers@update');
$router->delete('/Studio/{id}', 'StudioControllers@delete');
$router->get('/Tayang', 'TayangControllers@index');
$router->post('/Tayang', 'TayangControllers@create');
