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


// Route::resource('/users', 'UsersController');
Route::get('/users-restore/{id}', 'UsersController@restore');
Route::get('/users-delete/{id}', 'UsersController@delete');


// Route::resource('/factor-salary', 'BacLuongController');

Route::get('/factor-salary-restore/{id}', 'BacLuongController@restore');
Route::get('/factor-salary-delete/{id}', 'BacLuongController@delete');

//kiểm tra dữ liệu api
Route::resource('/roles', 'RoleController');
Route::get('/role-restore/{id}', 'RoleController@restore');
Route::get('/role-delete/{id}', 'RoleController@delete');

// Route::group(['prefix' => '/chuc-vu'], function () {
//     Route::get('/', "ChucvuController@index")->name('cv.index');
//     Route::get('/all', "ChucvuController@getAll")->name('cv.getAll');
//     Route::get('/trash', "ChucvuController@getTrash")->name('cv.getTrash');
//     Route::get('/{id}', "ChucvuController@findById")->name('cv.findById');
//     Route::get('/{id}/trash', "ChucvuController@findTrashById")->name('cv.findTrashById');
//     Route::post('/', "ChucvuController@create")->name('cv.create');
//     Route::put('/{id}', "ChucvuController@update")->name('cv.update');
//     Route::put('/{id}/restore', "ChucvuController@restore")->name('cv.restore');
//     Route::delete('/{id}', "ChucvuController@moveToTrash")->name('cv.moveToTrash');
//     Route::delete('/{id}/delete', "ChucvuController@delete")->name('cv.delete');
// });

//kiểm tra dữ liệu api chấm công lương tháng
Route::resource('/timesheets', 'TimesheetsController');
Route::get('/timesheets-restore/{id}', 'TimesheetsController@restore');
Route::get('/timesheets-delete/{id}', 'TimesheetsController@delete');

