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

$router->post('api/v1/user/register', ['middleware' => 'basicAuth', 'uses' => 'UserController@registerUser']);
$router->post('api/v1/user/login', ['middleware' => 'basicAuth', 'uses' => 'UserController@loginUser']);
$router->get('api/v1/user', ['middleware' => 'jwtAuthbasicAuth', 'uses' => 'UserController@getListUser']);
$router->get('api/v1/user/{userId}', ['middleware' => 'basicAuth', 'uses' => 'UserController@getProfile']);
