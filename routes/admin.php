<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\IngredientController;

Route::get('/', [AuthController::class, 'login'])->name('admin.login');
Route::post('/signin', [AuthController::class, 'signin'])->name('admin.signin');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('admin_or_moderator.auth')->name('admin.logout');

Route::group(['middleware'=>'admin_or_moderator.auth'], function () {
    Route::get('/change_password', [AuthController::class, 'changePassword'])->name('admin.change_password');
    Route::post('/change_password', [AuthController::class, 'saveChangePassword'])->name('admin.save_change_password');
});

Route::group(['middleware'=>'admin.auth'], function () {
    Route::get('/add_user', [AuthController::class, 'addUser'])->name('admin.add_user');
    Route::post('/add_user', [AuthController::class, 'saveUser'])->name('admin.save_add_user');
});

Route::group(['prefix'=>'profile','middleware'=>'admin_or_moderator.auth'], function () {
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

        Route::group(['prefix'=>'ingredient'], function () {
            Route::get('/', [IngredientController::class, 'index'])->name('admin.product.ingredient');
            Route::post('/', [IngredientController::class, 'store'])->name('admin.product.ingredient.store');
            Route::get('/create', [IngredientController::class, 'create'])->name('admin.product.ingredient.create');
            Route::delete('/{id}', [IngredientController::class, 'destroy'])->where('id', '[0-9]+')->name('admin.product.ingredient.destroy');
            Route::get('/edit/{id}', [IngredientController::class, 'edit'])->where('id', '[0-9]+')->name('admin.product.ingredient.edit');
            Route::put('/{id}', [IngredientController::class, 'update'])->where('id', '[0-9]+')->name('admin.product.ingredient.update');
        });
    });
});
