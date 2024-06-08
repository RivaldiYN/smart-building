<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\Admin\DeviceController;
use App\Http\Controllers\Admin\UserController;


Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('device', DeviceController::class);
        Route::resource('ruangan', RuanganController::class)->except('show');
    });

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
