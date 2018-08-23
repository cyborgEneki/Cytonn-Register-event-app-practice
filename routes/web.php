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
Route::get('/events_blade', 'PageController@events_index')->name('events_blade');
Route::get('/activities_blade', 'PageController@activities_index')->name('activities_blade');
Route::get('/roles_blade', 'PageController@roles_index')->name('roles_blade');
Route::get('/users_blade', 'PageController@users_index')->name('users_blade');
Route::get('/', 'PageController@login_index')->name('login_blade');
Route::get('/register', 'PageController@login_index')->name('register');
Route::get('/logout', 'Auth\RegisterController@logout')->name('logout');

Route::resource('events', 'EventController')->only([
    'create', 'edit','index'
]);

Route::get('/login', 'PageController@login_index')->name('home');


Route::resource('activities', 'ActivityController')->only([
    'create', 'edit','index'
]);

Route::resource('roles', 'RoleController')->only([
    'create', 'edit'
]);

Route::resource('users', 'UserController')->only([
    'create', 'edit'
]);

Route::get('/dashboard', 'PageController@index')
    ->middleware('auth')
    ->name('index');

//Route::get('/{any}', 'PageController@login_index')->where('any', '.*'); //AppController@getApp

