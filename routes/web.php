<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('register', [AuthController::class, 'showRegister'])->name('show.register');
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::prefix('admin/products')->middleware('auth:web')->group(function () {
    Route::get('', [ProductController::class, 'index'])->name('show.all.products');
    Route::get('detail/{id}', [ProductController::class, 'detail'])->name('show.product');
    Route::get('create', [ProductController::class, 'loadFromCreate'])->name('show.create.product');
    Route::post('create', [ProductController::class, 'create'])->name('create.product');
    Route::get('edit/{id}', [ProductController::class, 'loadFormEdit'])->name('show.edit.product');
    Route::put('edit/{id}', [ProductController::class, 'edit'])->name('edit.product');
    Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('delete.product');
});

Route::prefix('categories')->group(function () {
    Route::get('', [CategoryController::class, 'getListCategories'])->name('show.all.categories');
    Route::put('{id}', [CategoryController::class, 'editCategory'])->name('edit.category');
    Route::delete('{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');
});
