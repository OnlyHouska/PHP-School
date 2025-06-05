<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

use App\Http\Controllers\ProductController;

Route::get('catalog', [ProductController::class, 'index'])->name('products.index');
Route::get('product/new', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');

Route::get('login', function () {
    return view('login');
})->name('login');
