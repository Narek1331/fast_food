<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\LocaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::redirect('/', '/am');

Route::get('locale', [LocaleController::class, 'changeLocale'])->name('locale.change');

Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => 'localization'], function () {

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'auth','middleware'=>'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/forgot_password', [AuthController::class, 'forgotPassword'])->name('auth.forgot_password');
    Route::post('/forgot_password', [AuthController::class, 'forgotPasswordSave'])->name('auth.forgot_password_save');
    Route::post('/signup', [AuthController::class, 'signup'])->name('auth.signup');
    Route::post('/signin', [AuthController::class, 'signin'])->name('auth.signin');
});

Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::group(['prefix'=>'food'], function () {
    Route::get('/', [FoodController::class, 'index'])->name('food.index');
    Route::get('/{category_id}', [FoodController::class, 'index'])->where('id', '[0-9]+')->name('food.by_category');
    // Route::get('/{id}', [FoodController::class, 'show'])->where('id', '[0-9]+')->name('food.show');
});

Route::group(['prefix'=>'contact'], function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
});

Route::group(['prefix'=>'basket','middleware' => 'customer.auth'], function () {
    Route::get('/', [BasketController::class, 'index'])->name('basket.index');
    Route::post('/', [BasketController::class, 'store'])->name('basket.store');
    Route::delete('/{id}', [BasketController::class, 'destroy'])->where('id', '[0-9]+')->name('basket.destroy');
});

Route::group(['prefix'=>'order','middleware' => 'customer.auth'], function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::post('/', [OrderController::class, 'store'])->name('order.store');

    Route::group(['prefix'=>'my'], function () {
        Route::get('/', [OrderController::class, 'my'])->name('order.my');
    });

});

Route::group(['prefix'=>'category'], function () {
    Route::get('/', [CategoryController::class, 'index']);
});

Route::group(['prefix'=>'product'], function () {
    Route::get('/', [ProductController::class, 'index']);
});
Route::get('email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('email.verification.verify');

});

// Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');


