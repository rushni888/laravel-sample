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

Route::get('admin', function () {
    return view('admin');
});

Route::get('/newstd', function () {
    return view('newstudent');
});

Route::get('/studentlogin', function () {
    return view('studentlogin');
});

Route::get('/mailler', function () {
    return view('mailesend');
});

Route::post('adminlog','Logincontroller@adminlogin');
Route::post('newstudentac','studentcontroller@newaccount');
Route::post('stdlog','studentcontroller@stdlogin');
Route::get('stdview','admin@viewstudent');
Route::get('logout','admin@logoutadmin'); 
Route::post('adminserch','admin@adminserch');
Route::get('delac/{id}','admin@deleteac');
Route::get('stdhome','studentcontroller@studenthome');
Route::get('stdlogout','studentcontroller@stdlogout');
Route::get('stdupdate/{id}','studentcontroller@updateprofile');
Route::post('updatedata/{id}','studentcontroller@updatestudentprofile');
Route::post('sendmail','mailler@sendmail');