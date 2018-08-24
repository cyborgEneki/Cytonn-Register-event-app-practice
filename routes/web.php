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

Route::get('/events_blade', 'PageController@events_index');

Route::get('/activities_blade', 'PageController@activities_index');

Route::get('/roles_blade', 'PageController@roles_index');

Route::get('/users_blade', 'PageController@users_index');

Route::get('/register', 'PageController@login_index');

//Route::get('/logout', 'Auth\RegisterController@logout');

Route::resource('events', 'EventController')->only([
    'create', 'edit','index'
]);

Route::resource('activities', 'ActivityController')->only([
    'create', 'edit','index'
]);

Route::resource('roles', 'RoleController')->only([
    'create', 'edit'
]);

Route::resource('users', 'UserController')->only([
    'create', 'edit'
]);

Route::get('/', 'PageController@index')
    ->middleware('auth');

Route::get('/home', 'PageController@index')
    ->middleware('auth');

Route::get('/{any}', 'PageController@login_index')->where('any', '.*'); //AppController@getApp

