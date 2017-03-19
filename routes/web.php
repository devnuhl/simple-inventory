<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ContainerController@index');

Route::get('/container/create', 'ContainerController@create');
Route::post('/container/create', 'ContainerController@store');

Route::get('/container/{container}', 'ContainerController@show');
Route::get('/container/{container}/item/create', 'ItemController@create');
Route::post('/container/{container}/item/create', 'ItemController@store');

Route::get('/container/{container}/item/{item}/edit', 'ItemController@edit');
Route::get('/item/{item}/edit', 'ItemController@edit');
Route::post('/item/{item}/edit', 'ItemController@store');

Route::get('/item/{item}/show', 'ItemController@show');

Route::get('/item/{item}/delete', 'ItemController@destroy');

Route::get('/item/{item}/meta/create', 'MetaController@create');
Route::post('/item/{item}/meta/create', 'MetaController@store');
Route::get('/item/{item}/meta/{meta}/edit', 'MetaController@edit');
Route::get('/meta/{meta}/edit', 'MetaController@edit');
Route::post('/meta/{meta}/edit', 'MetaController@update');
Route::get('/meta/{meta}/delete', 'MetaController@destroy');
