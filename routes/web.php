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

Auth::routes();
Route::get('/home', 'PageController@index')->name('home');
Route::get('/events_blade', 'PageController@events_index')->name('home');
Route::get('/activities_blade', 'PageController@activities_index')->name('home');
Route::get('/login_blade', 'PageController@login_index')->name('home');


Route::resource('activities', 'ActivityController');

Route::get('/', 'AppController@getApp')
    ->middleware('auth');
//Route::get('events', 'EventController@index');
//Route::get('events/{id}', 'EventController@show');
//Route::post('events', 'EventController@create');
//Route::delete('events/{id}', 'EventController@destroy');
//Route::put('events/{id}', 'EventController@update');

//Route::get('activities', 'ActivityController@index');
//Route::get('activities/{id}', 'ActivityController@show');
//Route::post('activities', 'ActivityController@create');
//Route::delete('activities/{id}', 'ActivityController@destroy');
//Route::put('activities/{id}', 'ActivityController@update');

Route::get('/{any}', 'AppController@getApp')->where('any', '.*');
