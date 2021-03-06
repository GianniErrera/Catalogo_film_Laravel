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


Route::get('/tester', function () {
	$users = App\User::pluck('name','id')->toArray();
	dd($users);
    return view('select2',compact('users'));
});
Route::get('/prova_tailwind', 'TailwindController@create');
Route::post('/scarica_info_da_API/{id}', 'provaAjax@show');
Route::get('/random_generator', 'provaAjax@index');
Route::get('/genera_numero', 'provaAjax@create');
Route::get('/', 'FilmController@index')->name('home');
Route::post('/', 'GeneriController@index');
Route::get('/films/nuovo', 'FilmController@create');
Route::post('/films/nuovo', 'FilmController@store');
Route::get('/films/{id}', 'FilmController@show');
Route::get('/test', 'AdminController@test');

Route::get('/films/modifica/{id}', 'FilmController@edit');
Route::patch('/films/modifica/{id}', 'FilmController@update');

Route::get('/segreto/admin', 'AdminController@index');
Route::post('/segreto/admin', 'AdminController@generi');
Route::patch('/segreto/admin/films/valida/{id}', 'ValidaFilm@update');
Route::delete('/segreto/admin/films/elimina/{id}', 'FilmController@destroy');
Route::get('/segreto/admin/films/{id}', 'AdminController@show');
