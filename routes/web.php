<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ItemsController@index');
Route::get('settings', 'ItemsController@settings');
Route::post('updatestyle/{id}', 'ItemsController@saveStyle');
Route::post('updatecolor/{id}', 'ItemsController@saveColor');
Route::post('updateposition/{id}', 'ItemsController@savePosition');
