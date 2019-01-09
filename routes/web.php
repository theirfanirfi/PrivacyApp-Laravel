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





Route::group(['prefix' => '/', 'middleware' => 'LoginWare'], function(){

    Route::get('/signup','LoginController@signupGet')->name('signup');

    Route::get('/', 'LoginController@index');

    Route::get('/login','LoginController@index')->name('login');
Route::post('/signup','LoginController@signup')->name('signup');
Route::post('/login','LoginController@loginPost')->name('login');


});


Route::group(['prefix' => 'home', 'middleware' => 'AuthWare'],function(){
Route::get('/','HomeController@index')->name('home');
Route::get('/changepassword','HomeController@changepassword')->name('changepassword');
Route::get('/changeEmail','HomeController@changeEmailGet')->name('changeEmail');
Route::post('/changeEmail','HomeController@changeEmail')->name('changeEmail');
Route::post('/changePassword','HomeController@changePasswordPost')->name('changePassword');
Route::get('/logout','LoginController@logout')->name('logout');
});


//licenses routes

Route::group(['prefix' => 'licenses', 'middleware' => 'AuthWare'], function () {
Route::get('/', 'LicensesController@index')->name('licenses');
Route::get('addlicense', 'LicensesController@addlicense')->name('addlicense');
Route::post('addlicense', 'LicensesController@addlicensePost')->name('addlicense');
Route::post('editlicense', 'LicensesController@editlicensePost')->name('editlicensePost');
Route::get('deletelicense/{id}', 'LicensesController@deletelicense')->name('deletelicense');
Route::get('editlicense/{id}', 'LicensesController@editlicense')->name('editlicense');
});

//emails to monitor routes

Route::group(['prefix' => 'emails', 'middleware' => 'AuthWare'], function () {
Route::get('/', 'EmailsToMonitorController@index')->name('emails');
Route::get('addemail', 'EmailsToMonitorController@addemail')->name('addemail');
Route::post('addemail', 'EmailsToMonitorController@addemailPost')->name('addemail');

Route::get('editemail/{id}', 'EmailsToMonitorController@editemail')->name('editemail');
Route::get('deleteemail/{id}', 'EmailsToMonitorController@deleteemail')->name('deleteemail');
Route::post('editemail', 'EmailsToMonitorController@editemailPost')->name('editemailPost');

});


//companies routes

Route::group(['prefix' => 'companies', 'middleware' => 'AuthWare'], function () {
Route::get('/','CompaniesController@index')->name('companies');
Route::get('add', 'CompaniesController@addCompany')->name('addCompany');
Route::post('add', 'CompaniesController@addCompanyPost')->name('addCompany');

Route::get('/editCompany/{id}', 'CompaniesController@editCompany')->name('editCompany');
Route::post('/editCompanyPost', 'CompaniesController@editCompanyPost')->name('editCompanyPost');
Route::get('/deleteCompany/{id}', 'CompaniesController@deleteCompany')->name('deleteCompany');
});

//Spam phone numbers routes

Route::group(['prefix' => 'spams', 'middleware' => 'AuthWare' ], function () {
Route::get('/', 'SpamPhoneNumbersController@index')->name('spams');
Route::get('/addspam', 'SpamPhoneNumbersController@addspam')->name('addspam');
Route::post('/addSpamPost', 'SpamPhoneNumbersController@addSpamPost')->name('addSpamPost');
Route::post('/editSpamPost', 'SpamPhoneNumbersController@editSpamPost')->name('editSpamPost');
Route::get('/editSpam/{id}', 'SpamPhoneNumbersController@editSpam')->name('editSpam');
Route::get('/deleteSpam/{id}', 'SpamPhoneNumbersController@deleteSpam')->name('deleteSpam');
});
