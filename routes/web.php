<?php

// untuk tampilan awal yaitu dashboard ketika sudah login berbasis bootstrap
$router->get('/', function () use ($router){
    return $router->app->version();
});

// crud
Route::group(['middleware' => ['auth']], function ($router) {
$router->post('/create_apotek', 'ApotekController@create');
$router->get('/show_apotek', 'ApotekController@show');
$router->get('/show_detail_apotek/{id}', 'ApotekController@showDetail');
$router->put('/update_apotek/{id}', 'ApotekController@update');
$router->delete('/delete/{id}', 'ApotekController@delete');
});

// authentication
$router->group(['prefix' => 'auth'], function () use ($router) {
    // Matches "/api/register
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');
});
