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

Route::get('/', 'AppController@getApp')
    ->middleware('auth');

Route::get('events', 'EventController@getEvents');

Route::get('events/{id}', 'EventController@getEvent');

Route::post('events', 'EventController@postNewEvent');

Route::delete('events/{id}', 'EventController@destroy');

Route::put('events/{id}', 'EventController@update');

Route::get('activities', 'ActivityController@getActivity');

Route::get('activities/{id}', 'ActivityController@getActivity');

Route::post('activities', 'ActivityController@postNewActivity');

Route::get('/mail', function () {

    \App\Console\Commands\EventNotification::to('joanreneki@gmail.com')->send(new eventNotif);

    return view('emails.eventNotif');

});

Route::get('/{any}','AppController@getApp')->where('any', '.*');