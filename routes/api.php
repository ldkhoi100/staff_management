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


Route::resource('users', 'UserApiController');
Route::get('/users-restore/{id}', 'UserApiController@restore');
Route::get('/users-delete/{id}', 'UserApiController@delete');


Route::resource('/factor-salary', 'BacLuongController');

Route::get('/factor-salary-restore/{id}', 'BacLuongController@restore');
Route::get('/factor-salary-delete/{id}', 'BacLuongController@delete');