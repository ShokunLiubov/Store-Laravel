<?php

use App\Enum\User\Role;
use App\Http\Controllers\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
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

Route::prefix('make-up')->middleware('publicMenu')->group(function () {
    Route::get('', [IndexController::class, 'index'])->name('index');
    Route::get('/category/{category}', [CategoryController::class, 'index'])->name('category');
    Route::get('/product/{product}', [ProductController::class, 'index'])->name('product');
});

Route::prefix('make-up-admin')->group(function () {

    Route::get('/users', function () {
        dd(33);
    });
});

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
///в blade route('products.show', [$product->id]) - именнованные пути
