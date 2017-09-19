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


//Upload image and save in database
//Route::get('upload','FileController@index');
Route::get('file','FileController@index')->name('upload.file');
Route::post('file','FileController@storeFile');


Route::get('/pharmlogin', function () {
    return view('/auth/pharmlogin');
});

Route::post('/dashboard', 'pharmController@handlelogin');
//Login successful method!

//Pharmacy prescription view and form
Route::get('pharmview','pharmviewController@index');

