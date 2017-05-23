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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/send_email', 'ProfileController@showForm')->name('send_email');

Route::post('/pro_email', 'ProfileController@processForm')->name('pro_email');


Route::post('/image', 'ProfileController@processImage')->name('image');

Route::get('/text_file', 'ProfileController@textForm')->name('text_t');

Route::post('/text_file', 'ProfileController@orderTxt')->name('text_form');

Route::any('/download', 'ProfileController@download');



