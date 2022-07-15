<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{Auth\LoginController,HomeController,UserController,RoleController,PermissionController,SettingController};

Route::redirect('/', 'admin/login');

// Auth::routes();

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [LoginController::class, 'showLoginForm']);
    Route::post('/login', [LoginController::class, 'login'])->name('admin_login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin_logout');

    Route::group(['middleware' => ['auth']], function () {

        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::post('settings/update_records', [SettingController::class, 'update_records'])->name('update_records');
        Route::resource('settings', SettingController::class);
    });
});
