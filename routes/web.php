<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController; // Pastikan ProductController diimport

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);

// Ganti rute ini dengan yang benar
Route::resource('products', ProductController::class)->except([
    'show', 'edit'
]);

Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
