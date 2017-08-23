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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->post('/register', 'RegisterUser');

$app->group(['prefix' => 'user/', 'middleware' => 'auth'], function ($app) {
    $app->get('/details', 'UserDetails');
});

$app->group(['prefix' => 'user/note/', 'middleware' => 'auth'], function ($app) {
    $app->get('/create', 'CreateNote');
});
