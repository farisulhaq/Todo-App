<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function(){
    return view('welcome');
});

Auth::routes();

Route::get('/todos', 'TodoController@index')->name('index');

Route::get('/todos/create', 'TodoController@create')->name('create');

Route::post('/todos/store', 'TodoController@store')->name('store');

Route::get('/todos/show/{id}', 'TodoController@show')->name('show');

Route::get('/todos/edit/{id}', 'TodoController@edit')->name('edit');

Route::post('/todos/update/{id}', 'TodoController@update')->name('update');

Route::get('/todos/delete/{id}', 'TodoController@destroy')->name('delete');

Route::get('/todos/complete/{id}', 'TodoController@complete')->name('complete');

Route::get('/home', 'HomeController@index')->name('home');
