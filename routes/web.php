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

Route::post('/create', 'ClientController@store');

Route::get('/export', 'ExportController@exportViaMethodInjection');

Route::get('/edit/{id}', 'ClientController@edit');

Route::get('/remove/{id}', 'ClientController@destroy');

Route::get('/inactivate/{id}', 'ClientController@inactivate');

Route::get('/activate/{id}', 'ClientController@activate');

Route::resource('/', 'ClientController');

Route::post('/update/{id}', 'ClientController@update');
