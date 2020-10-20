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
// album route
Route::get('/', 'AlbumsController@index');
Route::get('/albums', 'AlbumsController@index');
Route::get('albums/{id}', 'AlbumsController@show');
Route::post('album/store', 'AlbumsController@store');

Route::get('albums/create', 'AlbumsController@create');

//photo route
Route::get('photo/create/{id}', 'PhotosController@create');
Route::post('photo/store', 'PhotosController@store');
Route::delete('photo/{id}', 'PhotosController@destroy');
Route::get('photo/{id}', 'PhotosController@show');
