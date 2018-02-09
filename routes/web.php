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

Route::get('/posts', 'PostsController@index')->name('posts');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Routing customer
Route::resource('customer', 'CustomerController')->middleware('auth');
Route::get('/addCustomer', 'CustomerController@create')->middleware('auth');
Route::post('/storeCustomer', 'CustomerController@store')->middleware('auth');
Route::post('/updateCustomer/{id}', 'CustomerController@update')->middleware('auth');
Route::get('/customer/show/{id}', 'CustomerController@show')->middleware('auth');
Route::get('customer/delete/{id}', 'CustomerController@destroy')->middleware('auth');
Route::get('customer/deletemanual/{id}', 'CustomerController@destroymanual')->middleware('auth');
Route::get('customer/edit/{id}', 'CustomerController@edit')->middleware('auth');






//Routing reservation
Route::get('reservation', 'ReservationController@index')->middleware('auth');
Route::get('/result', 'ReservationController@autoComplete')->middleware('auth');
Route::get('/addReservation', 'ReservationController@create')->middleware('auth');
Route::post('/storeReservation', 'ReservationController@store')->middleware('auth');
Route::post('/updateReservation/{id}', 'ReservationController@update')->middleware('auth');
Route::get('/reservation/show/{id}', 'ReservationController@show')->middleware('auth');
Route::get('reservation/delete/{id}', 'ReservationController@destroy')->middleware('auth');
Route::get('reservation/deletemanual/{id}', 'ReservationController@destroymanual')->middleware('auth');
Route::get('reservation/edit/{id}', 'ReservationController@edit')->middleware('auth');

//Routing rute 
Route::resource('route', 'RuteController')->middleware('auth');
Route::get('/addRoute', 'RuteController@create')->middleware('auth');
Route::post('/storeRoute', 'RuteController@store')->middleware('auth');
Route::post('/updateRoute/{id}', 'RuteController@update')->middleware('auth');
Route::get('/route/show/{id}', 'RuteController@show')->middleware('auth');
Route::get('route/delete/{id}', 'RuteController@destroy')->middleware('auth');
Route::get('route/deletemanual/{id}', 'RuteController@destroymanual')->middleware('auth');
Route::get('route/edit/{id}', 'RuteController@edit')->middleware('auth');



// Select box

