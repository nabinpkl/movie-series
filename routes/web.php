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

Route::get('/movies', 'MovieController@index')->name('movies');
Route::post('/movies', 'MovieController@store')->name('movies');
Route::get('/movies/create', 'MovieController@create')->name('movie_create');
Route::put('/movie/{id}/edit', 'MovieController@edit')->name('movie_edit');
Route::get('/movie/{id}', 'MovieController@show')->name('movie_show');
Route::delete('/movie/{id}', 'MovieController@delete')->name('movie_delete');
