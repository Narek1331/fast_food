<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;

Route::get('/', [AuthController::class, 'login']);
Route::post('/signin', [AuthController::class, 'signin'])->name('admin.signin');

Route::group(['prefix'=>'profile'], function () {
    Route::get('/', [ProfileController::class, 'index']);
});
