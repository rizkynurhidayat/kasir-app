<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('home');
})->name('home');

// Produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// Customer
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');

// Keranjang
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::delete('/cart-clear', [CartController::class, 'clear'])->name('cart.clear');

Route::resource('cart', CartController::class)->only(['index', 'store', 'destroy']);
Route::put('cart/{cart}', [CartController::class, 'update'])->name('cart.update');
Route::post('cart-clear', [CartController::class, 'clear'])->name('cart.clear');

// Transaksi
Route::post('/checkout', [TransactionController::class, 'checkout'])->name('checkout');
Route::get('/transactions/history', [TransactionController::class, 'history'])->name('transactions.history');
// Route::post('transaction-store', [TransactionController::class, 'store'])->name('transaction.store');
Route::post('/transaction-store', [TransactionController::class, 'store'])->name('transaction.store');
Route::get('/transactions-history', [TransactionController::class, 'history'])->name('transactions.history');



// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layouts/app');
// });
// // Route::resource('produk', ProdukController::class);
// // Route::resource('customer', CustomerController::class);
// Route::resource('products', ProductController::class);
// Route::resource('customers', CustomerController::class);
// // Cart
// Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
// Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
// Route::delete('/cart-clear', [CartController::class, 'clear'])->name('cart.clear');

// // Transaksi
// Route::post('/checkout', [TransactionController::class, 'checkout'])->name('checkout');
// Route::get('/transactions/history', [TransactionController::class, 'history'])->name('transactions.history');




