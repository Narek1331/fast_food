<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\Auth\LoginController;

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

Route::get('/{any}', function ($any) {
    if (!preg_match('/^(am|ru|en)/', $any)) {
        return Redirect::to('/am');
    }
})->where('any', '.*');

Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => 'localization'], function () {

Route::group([], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/shop', [HomeController::class, 'shop']);
    Route::get('/shop/{id}', [HomeController::class, 'shopSingle']);
    Route::get('/contact', [HomeController::class, 'contact']);
    Route::get('/checkout', [HomeController::class, 'checkout']);
    Route::get('/testimonial', [HomeController::class, 'testimonial']);
    Route::get('/basket', [HomeController::class, 'basket']);
    Route::get('/not_found', [HomeController::class, 'notFound']);
});

Route::group(['prefix'=>'category'], function () {
    Route::get('/', [CategoryController::class, 'index']);
});

Route::group(['prefix'=>'product'], function () {
    Route::get('/', [ProductController::class, 'index']);
});

});



// Route::group(['prefix'=>'/admin'], function () {
//     Route::get('/', [CategoryController::class, 'index']);
// });
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
