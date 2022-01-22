<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\PosController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('me', [AuthController::class, 'me'])->name('me');

});

Route::apiResource('employee', EmployeeController::class);
Route::apiResource('supplier', SupplierController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('product', ProductController::class);
Route::apiResource('stock', StockController::class);
Route::apiResource('expense', ExpenseController::class);
Route::apiResource('customer', CustomerController::class);

//pos
Route::get('/getting/product/{id}', [PosController::class, 'GetProduct'])->name('getting.product');

//add to cart
Route::get('/AddToCart/{id}', [CartController::class, 'AddToCart'])->name('AddToCart');
Route::get('/cart/product', [CartController::class, 'CartData'])->name('CartData');
Route::get('/remove/cart/{id}', [CartController::class, 'removeCart'])->name('removeCart');
Route::get('/increment/{id}', [CartController::class, 'increment'])->name('increment');
Route::get('/decrement/{id}', [CartController::class, 'decrement'])->name('decrement');
Route::get('/vat', [CartController::class, 'vats'])->name('vat');
