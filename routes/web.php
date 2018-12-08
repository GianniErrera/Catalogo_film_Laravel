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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'FilmController@index')->name('home');
Route::post('/', 'GeneriController@index');
Route::get('/films/nuovo', 'FilmController@create');
Route::post('/films/nuovo', 'FilmController@store');
Route::get('/films/{id}', 'FilmController@show');

Route::get('/films/modifica/{id}', 'FilmController@edit');
Route::patch('/films/modifica/{id}', 'FilmController@update');
