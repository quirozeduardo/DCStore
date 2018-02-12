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

Route::get('/', 'IndexController@index');
Route::get('/peliculas', 'IndexController@movies');
Route::get('/peliculas/calidad/{quality}', function(){

});
Route::get('/peliculas/genero/{gender}', function(){
	
});
Route::get('/series', 'IndexController@series');
Route::get('/juegos', 'IndexController@games');
Route::get('/software', 'IndexController@softwares');

