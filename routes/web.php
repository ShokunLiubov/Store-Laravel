<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::prefix('make-up')->middleware(['publicMenu'])->group(callback: function () {
    Auth::routes();

    Route::get('', [IndexController::class, 'index'])->name('index');
    Route::get('/category/{category}', [CategoryController::class, 'index'])->name('category');
    Route::get('/product/{product}', [ProductController::class, 'index'])->name('product');

    Route::prefix('/cart')->group(function () {
        Route::post('/show', [CartController::class, 'show'])->name('cart.show');
        Route::post('/hide', [CartController::class, 'hide'])->name('cart.hide');
        Route::post('/add/{product}', [CartController::class, 'add'])->name('cart.add');
        Route::post('/increment/{product}', [CartController::class, 'increment'])->name('cart.increment');
        Route::post('/decrement/{product}', [CartController::class, 'decrement'])->name('cart.decrement');
        Route::post('/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    });

//    Route::middleware('auth')->group(function () {
//        Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
//            ->name('logout');
//    });
//
//    Route::prefix('/auth')->middleware('guest')->group(function () {
//        Route::get('/{action}', [AuthController::class, 'auth'])
//            ->where('action', 'login|register')
//            ->name('auth');
//        Route::post('register', [RegisterController::class, 'store'])->name('register');
//        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
//    });

});

Route::prefix('make-up-admin')->group(function () {
    Route::get('/users', function () {
        dd(33);
    });
});

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
///в blade route('products.show', [$product->id]) - именнованные пути

