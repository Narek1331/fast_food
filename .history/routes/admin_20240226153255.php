<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

Route::get('/', [AuthController::class, 'login']);

