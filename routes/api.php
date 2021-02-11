<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\TransactionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', [ProductsController::class, 'all']);
Route::post('checkout', [CheckoutController::class, 'checkout']);
Route::get('transaction/{id}', [TransactionsController::class, 'get']);