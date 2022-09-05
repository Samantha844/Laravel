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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/empleado/index', 'EmpleadoController@index')->name('empleado.index');

Route::get('/empleado/create', 'EmpleadoController@create')->name('empleado.create');
Route::post('/empleado/store', 'EmpleadoController@store')->name('empleado.store');

Route::delete('/empleado/{empleado}', 'EmpleadoController@destroy')->name('empleado.destroy');


Route::post('/changeLang', 'HomeController@changeLang')->name('changeLang');

Route::get('/changeLangGet/{locale_id}', 'HomeController@changeLangGet')->name('changeLangGet');