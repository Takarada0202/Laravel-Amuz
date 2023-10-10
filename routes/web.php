<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;


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


Route::get('/', [ProductController::class, 'index'])->name('products.index')->middleware('verified');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/createProduct', [ProductController::class, 'createProduct'])->name('create.Product');
Route::get('products/{product}',[ProductController::class, 'show'])->name("products.show");
Route::get('gproducts/{product}/edit', [ProductController::class, 'edit'])->name("products.edit");
Route::patch('products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
Auth::routes(['verify' => true]);
