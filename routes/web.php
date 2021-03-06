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

Route::get('/','WelcomeController@index')->name('welcome');
Route::get('/about', 'AboutController@index')->name('about');

//Auth::routes();
Route::resource('pictures', 'PictureController');
Route::get('/pictures/{id}/img', 'PictureController@fullUrl');
Route::get('/pictures/{id}/thumb', 'PictureController@thumbUrl');

Route::resource('posts', 'PostController');
//Route::resource('events', 'EventController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/refreshEtsy', 'AdminController@refreshEtsy');


Route::get('/auth', 'Auth\LoginController@showLoginForm')->name('auth');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
