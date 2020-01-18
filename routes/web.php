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




Route::get('numeros', 'NumeroController@index');
Route::post('numeros/importar', 'NumeroController@importar');
Route::get('numeros/exportar', 'NumeroController@exportar');
Route::post('numeros/add', 'NumeroController@store');