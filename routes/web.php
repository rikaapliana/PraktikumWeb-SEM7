<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\KustomerController;

Route::get('/', function () {return view('welcome');
});

Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);
Route::resource('products', ProductController::class)->except([
    'show', 'edit'
]);
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::resource('categories', CategoryController::class);
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::resource('satuan', SatuanController::class);
Route::resource('kustomer', KustomerController::class);
Route::get('printpdf', [UserController ::class, 'printPDF'])->name('printuser');
Route::get('/printexcel', [UserController::class, 'userExcel'])->name('exportuser');
Route::get('/categories/pdf', [CategoryController::class, 'exportPdf'])->name('categories.pdf');
Route::get('/categories/excel', [CategoryController::class, 'exportExcel'])->name('categories.excel');
Route::get('products/pdf', [ProductController::class, 'printPdf'])->name('products.pdf');
Route::get('products/excel', [ProductController::class, 'exportExcel'])->name('products.excel');
Route::get('products/pdf', [ProductController::class, 'printPdf'])->name('products.pdf');
Route::get('products/excel', [ProductController::class, 'exportExcel'])->name('products.excel');
