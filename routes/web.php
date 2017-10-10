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

Route::get('/home','HomeController@index')->name('home');


//Upload image and save in database
//Route::get('upload','FileController@index');
Route::get('file','FileController@index')->name('upload.file');
Route::post('file','FileController@storeFile');

//Route::post('file', 'FileController@mail');

//Route::post('registermail', 'Auth/RegisterController@regmail');


Route::get('/pharmlogin', function () {
    return view('/auth/pharmlogin');
});

//Login successful method!
Route::post('/dashboard', 'pharmController@handlelogin');

//pagination
Route::get('/dashboard', 'pharmController@viewpage');

// Pharmacy recent order view page
Route::get('/pharmrecent', 'pharmrecentController@viewrecent');

// user purchase history view page
Route::get('/purchasehistory', 'purchasehistoryController@viewpurchase');


//Pharmacy prescription view and form
Route::get('pharmview/{order_id}','pharmviewController@index');


//updating order data with prescription details
Route::post('pharmview/{order_id}', 'pharmviewController@update');

//inserting data into drug table
Route::get('/Drugdetail', 'InventoryController@loadform');
Route::post('/Drugdetail','InventoryController@submitform')->name('submit.form');







// ***********************************************************
/*Routing for
Invoice generation*/


/*Routing for Invoice generation*/



Route::get('/invoice/{ord_id}','InvoiceCreator@index');

//web.php

Route::get('/downloadPDF/{ord_id}','InvoiceCreator@downloadPDF');


Route::get('/cancel/{ord_id}','InvoiceCreator@cancelorder');


//****************************************************************

//user logout
//Route::post('/logout', 'logoutController@getLogout');


Route::group(['middleware' => 'prevent-back-history'],function(){
	Auth::routes();
	Route::get('/home', 'HomeController@index');
	
});