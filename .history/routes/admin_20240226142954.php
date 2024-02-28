<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
    // Define your admin routes here
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/users', 'AdminController@users')->name('admin.users');
    // Other admin routes...
});
