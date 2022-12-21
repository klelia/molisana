<?php

use App\Http\Controllers\Guest\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\ProductController as ProductController;
use App\Http\Controllers\Guest\RecipeController as RecipeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('products', ProductController::class);

Route::resource('recipes', RecipeController::class);



