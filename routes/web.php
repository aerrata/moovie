<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'MovieController@index')->name('movies');
Route::get('/movies/{movie}', 'MovieController@show')->name('movies.show');

Route::get('/partial/popular-movies', 'MovieController@partialPopularMovies')->name('movies.partialPopularMovies');
Route::get('/partial/now-playing-movies', 'MovieController@partialNowPlayingMovies')->name('movies.partialNowPlayingMovies');
