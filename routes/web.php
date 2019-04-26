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
    return view('welcome');
});

Route::get('g', function () {
    return view('gallery');
});

Route::get('gl', 'GalleryController@Index')->name('Index');
// Route::get('dashboard', 'AdminDashboardController@getIndex1')->name('getIndex1');


// Route::get('form','FormController@create');
Route::post('form','GalleryController@store');
