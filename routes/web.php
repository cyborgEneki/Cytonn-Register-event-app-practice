<?php

use App\Mail\eventNotif;

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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/events_blade', 'HomeController@events_index')->name('home');
Route::get('/activities_blade', 'HomeController@activities_index')->name('home');

Route::get('/', 'AppController@getApp')
    ->middleware('auth');

Route::group(['middleware' => 'admin'], function () {
    Route::get('events', 'EventController@index');
    Route::get('events/{id}', 'EventController@show');
    Route::post('events', 'EventController@create');
    Route::delete('events/{id}', 'EventController@destroy');
    Route::put('events/{id}', 'EventController@update');

    Route::get('activities', 'ActivityController@index');
    Route::get('activities/{id}', 'ActivityController@show');
    Route::post('activities', 'ActivityController@create');
    Route::delete('activities/{id}', 'ActivityController@destroy');
    Route::put('activities/{id}', 'ActivityController@update');
});

Route::group(['regular'], function () {
    Route::get('events', 'EventController@index');
    Route::get('events/{id}', 'EventController@show');

    Route::get('activities', 'ActivityController@index');
});

Route::get('/{any}', 'AppController@getApp')->where('any', '.*');
