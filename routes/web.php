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
<<<<<<< HEAD
Route::get('display','ImageController@show');

Route::get('/pharmlogin', function () {
    return view('/auth/pharmlogin');
});

Route::post('/dashboard', 'PharmController@handlelogin');
//Login successful method!
=======

//Pharmacy home page
Route::get('pharmhome','pharmController@index');

>>>>>>> aa188e2b2590d8d36b71dabc7b11feb3421d3a7e
// ***********************************************************
/*Routing for
Invoice generation*/
Route::get('/', function () {
    return view('invoice1');
});


Route::get('/index','UserDetailController@index');

Route::post('submitForm','UserDetailController@store');

//web.php

Route::get('/downloadPDF/{id}','UserDetailController@downloadPDF');

//****************************************************************