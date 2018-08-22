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

Route::resource('events', 'EventController')->only([
    'create', 'edit'
]);

Route::resource('events', 'EventController')->only([
    'create', 'edit'
]);

Route::get('/', 'PageController@index')
    ->middleware('auth');

//Route::get('/', 'AppController@getApp')
//    ->middleware('auth');



Route::get('/{any}', 'AppController@getApp')->where('any', '.*');

