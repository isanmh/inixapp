<?php

use App\Http\Controllers\API\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// localhost:8000/api/test
Route::get('test', [ProductApiController::class, 'test']);

// products Endpoint
Route::get('products', [ProductApiController::class, 'index']);
Route::post('products', [ProductApiController::class, 'store']);
Route::get('products/{id}', [ProductApiController::class, 'show']);
Route::put('products/{id}', [ProductApiController::class, 'update']);
Route::delete('products/{id}', [ProductApiController::class, 'destroy']);
Route::get('products/search/{name}', [ProductApiController::class, 'search']);
