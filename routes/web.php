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
    return view('home');
});

Auth::routes();

Route::get('/chat','MessagesController@DisplayMessages');

Route::get('/{user}/profile','UserProfileController@showProfile');

Route::post('/store','MessagesController@StoreMessage')->name('StoreMessage');

Route::post('/getajax','MessagesController@LoadMessagesAjax');

Route::post('/isactive', 'MessagesController@isActive');

Route::post('/notactive','MessagesController@notActive');
