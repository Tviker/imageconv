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
Route::resource('/', 'ImageController')->only(['index', 'store', 'show']);
Route::get('/', 'ImageController@index')->name('image.index');
Route::get('/show', 'ImageController@show')->name('image.show');
Route::post('/', 'ImageController@store')->name('image.store');

