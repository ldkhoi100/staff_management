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


Route::group(['prefix' => '/chuc-vu'], function () {
    Route::get('/', "ChucvuController@index")->name('cv.index');
    Route::get('/all', "ChucvuController@getAll")->name('cv.getAll');
    Route::get('/trash', "ChucvuController@getTrash")->name('cv.getTrash');
    Route::get('/{id}', "ChucvuController@findById")->name('cv.findById');
    Route::get('/{id}/trash', "ChucvuController@findTrashById")->name('cv.findTrashById');
    Route::post('/', "ChucvuController@create")->name('cv.create');
    Route::put('/{id}', "ChucvuController@update")->name('cv.update');
    Route::put('/{id}/restore', "ChucvuController@restore")->name('cv.restore');
    Route::delete('/{id}', "ChucvuController@moveToTrash")->name('cv.moveToTrash');
    Route::delete('/{id}/delete', "ChucvuController@delete")->name('cv.delete');
});



Route::group(['prefix' => '/donxinphep'], function () {
    Route::get('/', "DonXinPhepController@index")->name('dxp.index');
    Route::get('/all', "DonXinPhepController@getAll")->name('dxp.getAll');
    Route::get('/trash', "DonXinPhepController@getTrash")->name('dxp.getTrash');
    Route::get('/{id}', "DonXinPhepController@findById")->name('dxp.findById');
    Route::get('/{id}/trash', "DonXinPhepController@findTrashById")->name('dxp.findTrashById');
    Route::post('/', "DonXinPhepController@create")->name('dxp.create');
    Route::put('/{id}', "DonXinPhepController@update")->name('dxp.update');
    Route::put('/{id}/restore', "DonXinPhepController@restore")->name('dxp.restore');
    Route::delete('/{id}', "DonXinPhepController@moveToTrash")->name('dxp.moveToTrash');
    Route::delete('/{id}/delete', "DonXinPhepController@delete")->name('dxp.delete');
});









//User
Route::group(['prefix' => '/users', 'middleware' => 'role:ROLE_ADMIN|ROLE_SUPERADMIN'], function () {
    Route::get('/', 'UsersController@index')->name("user.index");
    Route::get('/trash', 'UsersController@getSoftDeletes')->name("user.getSoftDeletes");
    Route::get('/all', 'UsersController@indexAjax')->name('users.ajax');
    Route::get('/{id}', 'UsersController@edit');
    Route::post('/', 'UsersController@store')->name('users.store');
    Route::group(['middleware' => 'role:ROLE_SUPERADMIN'], function () {
        Route::get('/select/role', 'UsersController@selectRole')->name("user.selectRole");
        Route::get('/block/{id}', 'UsersController@block')->name('users.block');
        Route::get('/restore/{id}', 'UsersController@restore')->name('users.restore');
        Route::get('/delete/{id}', 'UsersController@delete')->name('users.delete');
        Route::put('/{id}', 'UsersController@update');
        Route::delete('/{id}', 'UsersController@moveToTrash');
    });
});

//Staff
Route::group(['prefix' => '/staff', 'middleware' => 'role:ROLE_ADMIN|ROLE_SUPERADMIN'], function () {
    Route::get('/', 'NhanVienController@index')->name("user.index");
    Route::get('/trash', 'NhanVienController@getSoftDeletes')->name("user.getSoftDeletes");
    Route::get('/all', 'NhanVienController@indexAjax')->name('users.ajax');
    Route::get('/{id}', 'NhanVienController@edit');
    Route::post('/', 'NhanVienController@store')->name('users.store');
    Route::group(['middleware' => 'role:ROLE_SUPERADMIN'], function () {
        Route::get('/select/role', 'NhanVienController@selectRole')->name("user.selectRole");
        Route::get('/block/{id}', 'NhanVienController@block')->name('users.block');
        Route::get('/restore/{id}', 'NhanVienController@restore')->name('users.restore');
        Route::get('/delete/{id}', 'NhanVienController@delete')->name('users.delete');
        Route::put('/{id}', 'NhanVienController@update');
        Route::delete('/{id}', 'NhanVienController@moveToTrash');
    });
});

Route::group(['prefix' => '/factor-salary', 'middleware' => 'role:ROLE_ADMIN|ROLE_SUPERADMIN'], function () {
    Route::get('/', "BacLuongController@index")->name('fs.index');
    Route::get('/all', "BacLuongController@getAll")->name('fs.getAll');
    Route::get('/trash', "BacLuongController@getTrash")->name('fs.getTrash');
    Route::get('/{id}/trash', "BacLuongController@findTrashById")->name('fs.findTrashById');
    Route::group(['middleware' => 'role:ROLE_SUPERADMIN'], function () {
        Route::post('/', "BacLuongController@create")->name('fs.create');
        Route::put('/{id}', "BacLuongController@update")->name('fs.update');
        Route::put('/{id}/restore', "BacLuongController@restore")->name('fs.restore');
        Route::delete('/{id}', "BacLuongController@moveToTrash")->name('fs.moveToTrash');
        Route::delete('/{id}/delete', "BacLuongController@delete")->name('fs.delete');
        Route::get('/{id}', "BacLuongController@findById")->name('fs.findById');
    });
});


Route::group(['prefix' => '/role'], function () {
    Route::get('/trash', 'RoleController@getSoftDeletes')->name('role.trash');
    Route::view('/view', 'Role.list');
    Route::resource('/', 'RoleController')->names('role')->parameter('', 'id');
    Route::put('/{id}/restore', 'RoleController@restore')->name('role.restore');
    Route::delete('/{id}/delete', 'RoleController@delete')->name('role.delete');
});