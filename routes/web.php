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

Route::get('/', 'IndexController@loadAll');
Route::get('/peliculas', 'MoviesController@loadMovies');
Route::get('/peliculas/calidad/{quality}', function(){

});
Route::get('/peliculas/genero/{gender}', function(){
	
});
Route::get('/series', 'MoviesController@loadMovies');
Route::get('/juegos', 'MoviesController@loadMovies');
Route::get('/software', 'MoviesController@loadMovies');

