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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/users', 'UserApiController@index')->name('users.all');

Route::get('/users/{customerId}', 'UserApiController@show')->name('users.show');

Route::post('/users', 'UserApiController@store')->name('users.store');

Route::put('/users/{customerId}', 'UserApiController@update')->name('users.update');

Route::delete('/users/{customerId}', 'UserApiController@destroy')->name('users.destroy');