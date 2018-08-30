<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('events', 'Api\EventController');

Route::resource('activities', 'Api\ActivityController');

Route::resource('roles', 'Api\RoleController');

Route::resource('users', 'Api\UserController');
Route::patch('/activities/{event}/{activity}/check/{status}', 'Api\ActivityController@check');