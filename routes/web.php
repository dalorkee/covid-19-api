<?php
use Illuminate\Support\Str;
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

$router->get('/key', function() {
	return Str::random(32);
});

$router->group(['prefix' => 'api'], function () use ($router) {
	$router->post('user/login', ['user' => 'UserController@login']);
	$router->get('data', 'CovidController@getData');
	$router->get('data/id/{id}', 'CovidController@getDataFromId');
	$router->post('data/store', 'CovidController@store');
	$router->put('data/updte/{id}', 'CovidController@update');
	$router->delete('data/destroy/{id}', 'CovidController@destroy');
});

$router->group(['prefix' => 'api'], function ($router) {
	$router->post('user/register', 'UserController@register');
	$router->post('user/login', ['uses' => 'UserController@login']);
});
