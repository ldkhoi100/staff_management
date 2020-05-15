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

/**
 * Table chuc-vu
 */
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

/**
 * Table donxinphep
 */
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


/**
 * Table users
 */
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

/**
 * Table Nhan vien
 */
Route::group(['prefix' => '/staff', 'middleware' => 'role:ROLE_ADMIN|ROLE_SUPERADMIN'], function () {
    Route::get('/', 'NhanVienController@index')->name("nhanvien.index");
    Route::get('/trash', 'NhanVienController@getSoftDeletes')->name("nhanvien.getSoftDeletes");
    Route::get('/all', 'NhanVienController@indexAjax')->name('nhanvien.ajax');
    Route::get('/{id}', 'NhanVienController@edit');
    Route::post('/', 'NhanVienController@store')->name('nhanvien.store');
    Route::group(['middleware' => 'role:ROLE_SUPERADMIN'], function () {
        Route::get('/select/maCV', 'NhanVienController@selectMaCV')->name("nhanvien.selectMaCV");
        Route::get('/block/{id}', 'NhanVienController@block')->name('nhanvien.block');
        Route::get('/restore/{id}', 'NhanVienController@restore')->name('nhanvien.restore');
        Route::get('/delete/{id}', 'NhanVienController@delete')->name('nhanvien.delete');
        Route::put('/{id}', 'NhanVienController@update');
        Route::delete('/{id}', 'NhanVienController@moveToTrash');
    });
});

/**
 * Table he-so-luong
 */
Route::group(['prefix' => '/factor-salary', 'middleware' => ['auth', 'role:ROLE_ADMIN|ROLE_SUPERADMIN']], function () {
    Route::get('/', "FactorSalaryController@index")->name('fs.index');
    Route::get('/all', "FactorSalaryController@getAll")->name('fs.getAll');
    Route::get('/trash', "FactorSalaryController@getTrash")->name('fs.getTrash');
    Route::get('/{id}/trash', "FactorSalaryController@findTrashById")->name('fs.findTrashById');
    Route::group(['middleware' => 'role:ROLE_SUPERADMIN'], function () {
        Route::post('/', "FactorSalaryController@create")->name('fs.create');
        Route::put('/{id}', "FactorSalaryController@update")->name('fs.update');
        Route::put('/{id}/restore', "FactorSalaryController@restore")->name('fs.restore');
        Route::delete('/{id}', "FactorSalaryController@moveToTrash")->name('fs.moveToTrash');
        Route::delete('/{id}/delete', "FactorSalaryController@delete")->name('fs.delete');
        Route::get('/{id}', "FactorSalaryController@findById")->name('fs.findById');
    });
});

/**
 * Table Luong co ban
 */
Route::group(['middleware' => 'auth', 'prefix' => '/base-salary'], function () {
    Route::get('/', 'FactorSalaryController@getBaseSalary')->name('bs.get');
    Route::put('/', 'FactorSalaryController@updateBaseSalary')->middleware('role:ROLE_SUPERADMIN')->name('bs.update');
});

/**
 * Table roles
 */
Route::group(['prefix' => '/role'], function () {
    Route::get('/trash', 'RoleController@getSoftDeletes')->name('role.trash');
    Route::view('/view', 'Role.list');
    Route::resource('/', 'RoleController')->names('role')->parameter('', 'id');
    Route::put('/{id}/restore', 'RoleController@restore')->name('role.restore');
    Route::delete('/{id}/delete', 'RoleController@delete')->name('role.delete');
});

/**
 * Table ca lam
 */
Route::group(['prefix' => '/work-shift', 'middleware' => ['auth', 'role:ROLE_ADMIN|ROLE_SUPERADMIN']], function () {
    Route::get('/', "WorkShiftController@index")->name('ws.index');
    Route::get('/all', "WorkShiftController@getAll")->name('ws.getAll');
    Route::get('/trash', "WorkShiftController@getTrash")->name('ws.getTrash');
    Route::get('/{id}/trash', "WorkShiftController@findTrashById")->name('ws.findTrashById');
    Route::group(['middleware' => 'role:ROLE_SUPERADMIN'], function () {
        Route::post('/', "WorkShiftController@create")->name('ws.create');
        Route::put('/{id}', "WorkShiftController@update")->name('ws.update');
        Route::put('/{id}/restore', "WorkShiftController@restore")->name('ws.restore');
        Route::delete('/{id}', "WorkShiftController@moveToTrash")->name('ws.moveToTrash');
        Route::delete('/{id}/delete', "WorkShiftController@delete")->name('ws.delete');
        Route::get('/{id}', "WorkShiftController@findById")->name('ws.findById');
    });
});