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

Route::get('/movies', 'MoviesController@index')->name('movies');
Route::post('/movies/create', 'MoviesController@create')->name('movie_create');
Route::put('/movies/edit', 'MoviesController@edit')->name('movie_edit');
Route::get('/movie/{id}', 'MoviesController@show')->name('movie_show');
Route::delete('/movie/{id}', 'MoviesController@delete')->name('movie_delete');
