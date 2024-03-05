<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

Route::get('/', [AuthController::class, 'login']);
Route::post('/signin', [AuthController::class, 'signin'])->name('admin.signin');

