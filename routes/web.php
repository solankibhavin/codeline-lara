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

Route::redirect('/', '/films', 301);


Auth::routes();


Route::resource('genres', 'GenresController');
Route::resource('films', 'FilmsController');
Route::resource('comments', 'CommentsController');
//Route::resource('films/{slug}', 'FilmsController@index')->where(['slug' => '[A-Za-z-0-9]+[^-0-9.]+']);