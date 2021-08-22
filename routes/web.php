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

Auth::routes();
Route::get('/', 'UsuariosController@index')->name('usuario.index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usuarios/index', 'UsuariosController@index')->name('usuario.index');

Route::get('/usuarios/create', 'UsuariosController@create')->name('usuario.create');
Route::post('/usuarios/store', 'UsuariosController@store')->name('usuario.store');
Route::get('/usuarios/show/{id}', 'UsuariosController@show')->name('usuario.show');
Route::get('/usuarios/edit/{id}', 'UsuariosController@edit')->name('usuario.edit');
Route::post('/usuarios/store', 'UsuariosController@store');
Route::post('/usuarios/delete/{id}', 'UsuariosController@delete')->name('usuario.delete');
Route::match(['put', 'get'], '/usuarios/update', 'UsuariosController@update')->name('usuario.update');