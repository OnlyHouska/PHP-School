<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('catalog', [ProductController::class, 'index'])->name('products.index');
Route::get('product/new', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{product:slug}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product:slug}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/{cartItem}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
