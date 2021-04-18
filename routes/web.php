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

Route::delete('/session/destroy', 'Session@destroy');

Route::post('/session/create', 'Session@create');

Route::get('/self/password', 'Session@self');

Route::put('/self/update/password', 'Session@self');

Route::get('/self/update/{id}', 'Session@modify');

Route::put('/self/update/{id}/{attribute}', 'Session@update');

Route::get('/usuaris', 'UsuariController@index');

Route::get('/usuari/create', 'UsuariController@create');

Route::post('/usuari/create/save', 'UsuariController@store');

Route::delete('/usuari/remove', 'UsuariController@destroy');

Route::get('/usuari/update/{id}', 'UsuariController@modify');

Route::put('/usuari/update/{id}/{attribute}', 'UsuariController@update');

Route::get('/associacions', 'AssociacioController@index');

Route::get('/associacio/info/{cif}', 'AssociacioController@info');

Route::get('/associacio/create', 'AssociacioController@create');

Route::post('/associacio/create/save', 'AssociacioController@store');

Route::delete('/associacio/remove', 'AssociacioController@destroy');

Route::get('/associacio/update/{cif}', 'AssociacioController@modify');

Route::put('/associacio/update/{cif}/{attribute}', 'AssociacioController@update');

Route::get('/socis', 'SociController@index');

Route::get('/soci/create', 'SociController@create');

Route::post('/soci/create/save', 'SociController@store');

Route::get('/soci/info/{nif}', 'SociController@info');

Route::delete('/soci/remove', 'SociController@destroy');

Route::get('/soci/update/{nif}', 'SociController@modify');

Route::put('/soci/update/{nif}/{attribute}', 'SociController@update');

Route::get('/professionals', 'ProfessionalController@index');

Route::get('/professional/create', 'ProfessionalController@create');

Route::post('/professional/create/save', 'ProfessionalController@store');

Route::get('/professional/info/{nif}', 'ProfessionalController@info');

Route::delete('/professional/remove', 'ProfessionalController@destroy');

Route::get('/professional/update/{nif}', 'ProfessionalController@modify');

Route::put('/professional/update/{nif}/{tabla}/{attribute}', 'ProfessionalController@update');

Route::get('/voluntaris', 'VoluntariController@index');

Route::get('/voluntari/create', 'VoluntariController@create');

Route::post('/voluntari/create/save', 'VoluntariController@store');

Route::get('/voluntari/info/{nif}', 'VoluntariController@info');

Route::delete('/voluntari/remove', 'VoluntariController@destroy');

Route::get('/voluntari/update/{nif}', 'VoluntariController@modify');

Route::put('/voluntari/update/{nif}/{tabla}/{attribute}', 'VoluntariController@update');