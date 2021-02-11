<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Auth::routes(['register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [HomeController::class, 'index']);
Route::get('product/{id}/gallery', [ProductsController::class, 'gallery'])
    ->name('product.gallery');

Route::resource('product', ProductsController::class);
Route::resource('product-galleries', ProductGalleryController::class);

Route::get('transaction/{id}/set-status', [TransactionsController::class, 'setStatus'])->name('transaction.status');
Route::resource('transaction', TransactionsController::class);
