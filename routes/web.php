<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('products')->group(function () {
    Route::get('', [ProductController::class, 'index'])->name('show.all.products');
    Route::get('{id}', [ProductController::class, 'detail'])->name('show.product');
});

Route::prefix('categories')->group(function () {
    Route::get('', [CategoryController::class, 'getListCategories'])->name('show.all.categories');
    Route::put('{id}', [CategoryController::class, 'editCategory'])->name('edit.category');
    Route::delete('{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');
});
