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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/movies', 'MovieController@index')->name('movies');
Route::post('/movies', 'MovieController@store')->name('movies_store');
Route::get('/movies/create', 'MovieController@create')->name('movie_create');
Route::get('/movie/{id}/edit', 'MovieController@edit')->name('movie_edit');
Route::post('/movie/edit', 'MovieController@update')->name('movie_update');
Route::post('/movie/delete', 'MovieController@delete')->name('movie_delete');

Route::get('/series', 'SeriesController@index')->name('series');
Route::post('/series', 'SeriesController@store')->name('series_store');
Route::get('/series/create', 'SeriesController@create')->name('series_create');
Route::get('/series/{id}/edit', 'SeriesController@edit')->name('series_edit');
Route::post('/series/edit', 'SeriesController@update')->name('series_update');
Route::post('/series/delete', 'SeriesController@delete')->name('series_delete');
