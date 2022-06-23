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

$router->post('/auth', ['uses' => 'AuthController@auth']);

$router->post('/registrasi', ['uses' => 'RegistrasiController@registrasi']);

$router->get('/catatan', 'CatatanController@listCatatan');
$router->post('/catatan', 'CatatanController@createCatatan');
$router->post('/catatan/{id}', 'CatatanController@updateCatatan');
$router->get('/catatan/{id}', 'CatatanController@showCatatan');
$router->delete('/catatan/{id}', 'CatatanController@deleteCatatan');