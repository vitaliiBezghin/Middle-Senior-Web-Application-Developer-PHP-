<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('products', ProductController::class);

Route::get('cart', [CartController::class, 'cart']);
Route::post('add', [CartController::class, 'add']);
Route::patch('decrease/{id}', [CartController::class, 'decrease']);
Route::delete('remove/{id}', [CartController::class, 'remove']);
Route::delete('removeCart', [CartController::class, 'removeCart']);

