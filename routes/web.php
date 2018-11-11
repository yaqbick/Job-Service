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

Route::resource('advertisements','AdvertisementController');
Route::get('advertisements/create','AdvertisementController@create')->middleware('auth');

Route::resource('comments','CommentController');
Route::resource('/employers','EmployerController')->middleware('auth');


Auth::routes();
Route::get('/', 'AdvertisementController@index');
Route::get('advertisements/example/{id}','AdvertisementController@example');
Route::get('filtered/example/{id}','AdvertisementController@example');
Route::post('advertisements/filter','AdvertisementController@filter');
Route::get('advertisements/list/{id}','AdvertisementController@list');
Route::get('/home', 'HomeController@index')->name('home');
