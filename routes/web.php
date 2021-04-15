<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', 'Session@login');

Route::get('/inici', 'Session@index');

Route::get('/usuaris', 'Session@index');

Route::delete('/session/destroy', 'Session@destroy');

Route::post('/session/create', 'Session@create');

Route::get('/self/password', 'Session@self');

Route::put('/self/update/password', 'Session@self');

Route::get('/usuari/create', 'UsuariController@index');

Route::post('/usuari/create/save', 'UsuariController@store');

Route::delete('/usuari/remove', 'UsuariController@destroy');

Route::get('/usuari/update/{id}', 'UsuariController@modify');

Route::put('/usuari/update/{id}/{attribute}', 'UsuariController@update');


