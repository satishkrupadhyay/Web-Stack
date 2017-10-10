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
})->name('welcome');

Auth::routes();

Route::get('/home','HomeController@index')->name('home');


//Upload image and save in database

Route::get('file','FileController@index')->name('upload.file');
Route::post('file','FileController@storeFile');




Route::get('/pharmlogin', function () {
    return view('/auth/pharmlogin');
});


// Pharmacy recent order view page
Route::get('/pharmrecent', 'pharmrecentController@viewrecent');

// user purchase history view page
Route::get('/purchasehistory', 'purchasehistoryController@viewpurchase');


//Pharmacy prescription view and form
Route::get('pharmview/{order_id}','pharmviewController@index');


//updating order data with prescription details
Route::post('pharmview/{order_id}', 'pharmviewController@update');

//inserting data into inventory
Route::get('/inventory', 'InventoryController@loadform');
Route::post('/inventory','InventoryController@submitform')->name('submit.form');

/*Routing for Invoice generation*/



Route::get('/invoice/{ord_id}','InvoiceCreator@index');

//web.php

Route::get('/downloadPDF/{ord_id}','InvoiceCreator@downloadPDF');


Route::get('/cancel/{ord_id}','InvoiceCreator@cancelorder');


//****************************************************************

//user logout


Route::group(['middleware' => 'preventbackhistory'],function(){
	Auth::routes();
	Route::get('/home', 'HomeController@index');
	Route::get('/file','FileController@index')->name('upload.file');
	Route::get('/purchasehistory', 'purchasehistoryController@viewpurchase');

	//Route::get('/admin', 'AdminController@viewpage')->name('admin.home');

	
});


//Route::post('/pharmlogout', 'logoutController@getLogout');



//New code for pharmacy login and logout

Route::get('/admin/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin', 'AdminController@viewpage')->name('admin.home');