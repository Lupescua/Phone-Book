<?php

use App\Http\Controllers\PersonController;

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

Route::get('/', 'PersonController@index')->name('home');
Route::get('/create', 'PersonController@create')->name('create');
Route::post('/create', 'PersonController@store')->name('store');
Route::get('/edit/{id}', 'PersonController@edit')->name('edit');
Route::post('/edit', 'PersonController@update')->name('update');
Route::post('/destroy/{id}', 'PersonController@destroy')->name('destroy');
