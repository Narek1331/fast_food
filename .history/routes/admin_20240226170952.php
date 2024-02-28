<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', [AuthController::class, 'login'])->name('admin.login');
Route::post('/signin', [AuthController::class, 'signin'])->name('admin.signin');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('admin.auth')->name('admin.logout');

Route::group(['prefix'=>'profile','middleware'=>'admin.auth'], function () {
    Route::get('/', [ProfileController::class, 'index'])->name('admin.profile');

    Route::group(['prefix'=>'product'], function () {


        Route::group(['prefix'=>'category'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.profile.product.category');

        });
    });
});
