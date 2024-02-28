<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;

Route::get('/', [AuthController::class, 'login'])->name('admin.login');
Route::post('/signin', [AuthController::class, 'signin'])->name('admin.signin');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('admin.auth')->name('admin.logout');

Route::group(['prefix'=>'profile','middleware'=>'admin.auth'], function () {
    Route::get('/', [ProfileController::class, 'index'])->name('admin.profile');

    Route::group(['prefix'=>'product'], function () {

            Route::get('/', [ProductController::class, 'index'])->name('admin.product');
            Route::get('/{id}', [ProductController::class, 'show'])->where('id', '[0-9]+')->name('admin.product.show');
            Route::post('/', [ProductController::class, 'store'])->name('admin.product.store');
            Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
            Route::delete('/{id}', [ProductController::class, 'destroy'])->where('id', '[0-9]+')->name('admin.product.destroy');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->where('id', '[0-9]+')->name('admin.product.edit');
            Route::put('/{id}', [ProductController::class, 'update'])->where('id', '[0-9]+')->name('admin.product.update');

        Route::group(['prefix'=>'category'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.product.category');
            Route::post('/', [CategoryController::class, 'store'])->name('admin.product.category.store');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.product.category.create');
            Route::delete('/{id}', [CategoryController::class, 'destroy'])->where('id', '[0-9]+')->name('admin.product.category.destroy');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->where('id', '[0-9]+')->name('admin.product.category.edit');
            Route::put('/{id}', [CategoryController::class, 'update'])->where('id', '[0-9]+')->name('admin.product.category.update');

        });

        Route::group(['prefix'=>'size'], function () {
            Route::get('/', [SizeController::class, 'index'])->name('admin.product.size');
            Route::post('/', [SizeController::class, 'store'])->name('admin.product.size.store');
            Route::get('/create', [SizeController::class, 'create'])->name('admin.product.size.create');
            Route::delete('/{id}', [SizeController::class, 'destroy'])->where('id', '[0-9]+')->name('admin.product.size.destroy');
            Route::get('/edit/{id}', [SizeController::class, 'edit'])->where('id', '[0-9]+')->name('admin.product.size.edit');
            Route::put('/{id}', [SizeController::class, 'update'])->where('id', '[0-9]+')->name('admin.product.size.update');

        });
    });
});
