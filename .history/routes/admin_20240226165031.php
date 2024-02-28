<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;

Route::get('/', [AuthController::class, 'login'])->name('admin.login');
Route::post('/signin', [AuthController::class, 'signin'])->name('admin.signin');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('admin.logout');

Route::group(['prefix'=>'profile','middleware'=>'auth'], function () {
    Route::get('/', [ProfileController::class, 'index'])->name('admin.profile');
});
