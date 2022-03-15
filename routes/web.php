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

Route::get('/', 'TodoController@index')->name('home');

Route::get('/todos/create', 'TodoController@create')->name('create');

Route::post('/todos/store', 'TodoController@store')->name('store');

Route::get('/todos/show/{id}', 'TodoController@show')->name('show');

Route::get('/todos/edit/{id}', 'TodoController@edit')->name('edit');

Route::put('/todos/update/{id}', 'TodoController@update')->name('update');

Route::get('/todos/delete/{id}', 'TodoController@destroy')->name('delete');

Route::get('/todos/complete/{id}', 'TodoController@complete')->name('complete');