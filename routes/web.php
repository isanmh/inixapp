<?php

use App\Http\Controllers\PagesContoller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// controller routes
Route::get('/', [PagesContoller::class, 'homepage']);
Route::get('/about', [PagesContoller::class, 'about'])->name('about');
Route::get('/dashboard', [PagesContoller::class, 'dashboard'])->name('dashboard');
