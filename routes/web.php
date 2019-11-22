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

Auth::routes();
Route::resource('profile', 'UserController');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/profile', 'UserController@update_image');




// Route::post('{user}/like', 'UserController@like');

Route::post('/autocomplete/fetch', 'SearchController@fetch')->name('autocomplete.fetch');


Route::resource('posts', 'PostController');
