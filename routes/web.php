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

Route::middleware('auth')->get('user', function (Request $request) {
    return $request->user();
});

Route::get('/events_blade', 'EventController@index');

Route::get('/activities_blade', 'ActivityController@index');

Route::get('/roles_blade', 'RoleController@index');

Route::get('/users_blade', 'UserController@index');

Route::get('/register', 'LoginController@index');

Route::resource('/events', 'EventController');

Route::post('/events/{event}/{activity}', 'EventController@updateActivityStatus');

Route::resource('/activities', 'ActivityController');

Route::resource('/roles', 'RoleController');

Route::resource('/users', 'UserController');

Route::get('/', 'PageController@index')
    ->middleware('auth');

Route::get('/home', 'PageController@index')
    ->middleware('auth');

Route::get('/{any}', 'PageController@login_index')->where('any', '.*');

