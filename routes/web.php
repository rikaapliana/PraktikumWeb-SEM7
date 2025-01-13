<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SatuanController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk dashboard dan daftar pengguna
Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);

// Rute untuk produk dengan pengecualian show dan edit
Route::resource('products', ProductController::class)->except([
    'show', 'edit'
]);

// Rute untuk menampilkan dan mengedit produk
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Rute untuk kategori
Route::resource('categories', CategoryController::class);

// Rute untuk menampilkan kategori berdasarkan ID
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

// Routes untuk Satuan 
Route::resource('satuan', SatuanController::class);

//Routes untuk PrintPDF
Route::get('printpdf', [UserController ::class, 'printPDF'])->name('printuser');

//Routes untuk print Excell
Route::get('/printexcel', [UserController::class, 'userExcel'])->name('exportuser');
