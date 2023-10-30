<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\Product;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function (){
    dd(DB::table('orders')->get());
});

Route::get('/products/{id}', [ Product::class, 'show'])->name('products.show');
///в blade route('products.show', [$product->id]) - именнованные пути
