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

//Login successful method!
Route::post('/dashboard', 'pharmController@handlelogin');

//pagination
Route::get('/dashboard', 'pharmController@viewpage');


//Pharmacy prescription view and form
Route::get('pharmview','pharmviewController@index');


//updating order data with prescription details
Route::post('pharmview', 'pharmviewController@update');

<<<<<<< HEAD
Route::get('email', 'HomeController@mail');
=======
<<<<<<< HEAD
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
=======
>>>>>>> 30f7404f3fc07d82298021ebb62fdc3884fe4039
>>>>>>> ec8f7f74fb9472c252c0e4c2f9a9cc78b60472ea
