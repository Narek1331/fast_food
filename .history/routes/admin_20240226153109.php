<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;

Route::get('/', [LoginController::class, 'index']);

