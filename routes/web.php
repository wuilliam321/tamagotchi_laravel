<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/crear', 'HomeController@create');
Route::post('/store', 'HomeController@store');
Route::get('/jugar/{id}', 'HomeController@jugar');
Route::get('/jugar/{id}/dormir', 'HomeController@dormir');
Route::get('/jugar/{id}/television', 'HomeController@television');
Route::get('/jugar/{id}/comer', 'HomeController@comer');
Route::get('/jugar/{id}/ducharse', 'HomeController@ducharse');
Route::get('/jugar/{id}/hablar', 'HomeController@hablar');
Route::get('/jugar/{id}/correr', 'HomeController@correr');

