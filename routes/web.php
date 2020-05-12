<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Admin manager layouts
Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
Route::get('/errors', 'AdminController@error404')->name('error404');
Route::get('/blank', 'AdminController@blank')->name('blank');
Route::get('/button', 'AdminController@button')->name('button');
Route::get('/card', 'AdminController@card')->name('card');
Route::get('/chart', 'AdminController@chart')->name('chart');
Route::get('/table', 'AdminController@table')->name('table');
Route::get('/forgot-password', 'AdminController@forgotpassword')->name('forgotpassword');
Route::get('/loginadmin', 'AdminController@loginadmin')->name('loginadmin');
Route::get('/signup', 'AdminController@register')->name('signup');
Route::get('/animation', 'AdminController@animation')->name('animation');
Route::get('/border', 'AdminController@border')->name('border');
Route::get('/color', 'AdminController@color')->name('color');
Route::get('/orther', 'AdminController@orther')->name('orther');


Route::resource('/chucvu', 'ChucvuController');
Route::post('/chucvu/create', 'ChucvuController@store');
Route::view('chuc_vu', 'Chuc_vu.index');

//User
Route::group(['prefix' => '/users'], function () {
    Route::get('/', 'UsersController@index')->name("user.index");
    Route::get('/trash', 'UsersController@getSoftDeletes')->name("user.getSoftDeletes");
    Route::get('/all', 'UsersController@indexAjax')->name('users.ajax');
    Route::get('/select/role', 'UsersController@selectRole')->name("user.selectRole");
    Route::get('/restore/{id}', 'UsersController@restore')->name('users.restore');
    Route::get('/delete/{id}', 'UsersController@delete')->name('users.delete');
    Route::get('/block/{id}', 'UsersController@block')->name('users.block');
    Route::get('/{id}', 'UsersController@edit');
    Route::post('/', 'UsersController@store')->name('users.store');
    Route::put('/{id}', 'UsersController@update');
    Route::delete('/{id}', 'UsersController@moveToTrash');
});

Route::group(['prefix' => '/factor-salary'], function () {
    Route::get('/', "BacLuongController@index")->name('fs.index');
    Route::get('/all', "BacLuongController@getAll")->name('fs.getAll');
    Route::get('/trash', "BacLuongController@getTrash")->name('fs.getTrash');
    Route::get('/{id}', "BacLuongController@findById")->name('fs.findById');
    Route::get('/{id}/trash', "BacLuongController@findTrashById")->name('fs.findTrashById');
    Route::post('/', "BacLuongController@create")->name('fs.create');
    Route::put('/{id}', "BacLuongController@update")->name('fs.update');
    Route::put('/{id}/restore', "BacLuongController@restore")->name('fs.restore');
    Route::delete('/{id}', "BacLuongController@moveToTrash")->name('fs.moveToTrash');
    Route::delete('/{id}/delete', "BacLuongController@delete")->name('fs.delete');
});

Route::group(['prefix' => '/role'], function () {
    Route::view('/view', 'Role.list');
    Route::resource('/', 'RolesController')->names('role')->parameter('', 'id');
    Route::get('trash', 'RolesController@getSoftDeletes')->name('role.trash');
    Route::get('/role/restore', 'RolesController@restore')->name('role.restore');
});