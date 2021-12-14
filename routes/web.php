<?php

use App\Helpers\Wrapper\Wrapper;

// @var \Laravel\Lumen\Routing\Router $router

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

$router->get('/api/v1/ping', function () {
    return Wrapper::sendResponse(Wrapper::data('pong', 'This service is running properly'));
});

$router->get('api/v1/user', ['middleware' => 'basicAuth', 'uses' => 'UserController@GetUser']);
$router->get('api/v1/users', ['middleware' => 'jwtAuth', 'uses' => 'UserController@registerUser']);
