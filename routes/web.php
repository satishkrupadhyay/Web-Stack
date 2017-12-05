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

Route::get('/file','FileController@index')->name('upload.file');
Route::post('/file','FileController@storeFile');




Route::get('/pharmlogin', function () {
    return view('/auth/pharmlogin');
});

//Route when Order has been cancelled by Customer 
Route::get('/pharmviewback', function () {
    return view('/auth/dashboard');
});

// Pharmacy recent order view page
Route::get('/pharmrecent', 'pharmrecentController@viewrecent');

// user purchase history view page
Route::get('/purchasehistory', 'purchasehistoryController@viewpurchase');
Route::get('/recentupload', 'recentuploadController@recentupload');
Route::get('/cancelorder/{o_id}','recentuploadController@cancelorder');


//Pharmacy prescription view and form
Route::get('pharmview/{order_id}','pharmviewController@index');


//updating order data with prescription details
Route::post('pharmview/{order_id}', 'pharmviewController@update');

//inserting data into drug table
Route::get('/Drugdetail', 'InventoryController@loadform');
Route::post('/Drugdetail','InventoryController@submitform')->name('submit.form');

//View Drug Detail
Route::get('/ViewDrugdetail', 'InventoryController@viewdetail')->name('view.form');

//Editing drug details
Route::get('/ViewDrugdetail/ajax-edit-drugs', 'InventoryController@editDrugs');
Route::get('/ViewDrugdetail/ajax-postedit-drugs', 'InventoryController@submiteditDrugs');


//Edit pharmacy profile and change password

Route::get('/admin/profile', 'InventoryController@getPharmProfile')->name('view.pharm.profile');

Route::post('/admin/profile', 'InventoryController@postPharmProfile')->name('view.pharm.profile');

Route::get('/admin/change-password', 'InventoryController@getPharmChangePass')->name('view.pharm.changepass');
Route::post('/admin/change-password', 'InventoryController@postPharmChangePass')->name('view.pharm.changepass');

// ajax request for unique email and phone check while registering
Route::get('/ajax-check-unique-email', 'Auth\RegisterController@check_email')->name('ajax.unique.email');
Route::get('/ajax-check-unique-phone', 'Auth\RegisterController@check_phone')->name('ajax.unique.phone');


//Customer profile section and change password

Route::get('/home/profile', 'HomeController@getCustProfile')->name('view.cust.profile');
Route::post('/home/profile', 'HomeController@postCustProfile')->name('view.cust.profile');


Route::get('/home/change-password', 'HomeController@getCustChangePass')->name('view.cust.changepass');
Route::post('/home/change-password', 'HomeController@postCustChangePass')->name('view.cust.changepass');


// check login credentials while logging in for user


Route::get('/ajax-login-check-user', 'Auth\LoginController@validateCredentials')->name('ajax.login.check');

Route::get('/ajax-login-check-pharmacy', 'Auth\LoginController@validatePharmCredentials')->name('ajax.login.check.pharmacy');

//live search
Route::get('/ajax-live-search', 'Auth\RegisterController@liveSearch')->name('ajax.live.search');
Route::get('/ajax-brand-search', 'InventoryController@searchBrand')->name('ajax.searchbrandname');
Route::get('/ajax-generic-search', 'InventoryController@searchGeneric')->name('ajax.searchgenericname');
Route::get('/ajax-manufacturer-search', 'InventoryController@searchManufacturer')->name('ajax.searchmanufacturer');





/*Routing for Invoice generation*/



Route::get('/invoice/{ord_id}','InvoiceCreator@index');

//web.php

Route::get('/downloadPDF/{ord_id}','InvoiceCreator@downloadPDF');


Route::get('/cancel/{ord_id}','InvoiceCreator@cancelorder');


//****************************************************************

//user logout 
Route::get('/logout', 'Auth\LoginController@logout')->name('cust.logout');

Route::group(['middleware' => 'preventbackhistory'],function(){
	Auth::routes();
	Route::get('/home', 'HomeController@index');
	Route::get('/file','FileController@index')->name('upload.file');
	Route::get('/purchasehistory', 'purchasehistoryController@viewpurchase');

	//Route::get('/admin', 'AdminController@viewpage')->name('admin.home');

	
});


//Route::post('/pharmlogout', 'logoutController@getLogout');



//New code for pharmacy login and logout


Route::group(['middleware' => 'prevent'],function(){
	Auth::routes();
	Route::get('/admin', 'AdminController@viewpage')->name('admin.home');

	
});

Route::get('/admin/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin', 'AdminController@viewpage')->name('admin.home');

Route::get('/SendMessage','TextMessageController@SendMessage')->name('text.form');





/*Route::get('login', function () {

    return view('auth.login');
})->name('login');*/
