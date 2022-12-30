<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('admin.show.dashboard');

Route::group(['prefix' => 'products'], function () {
    Route::get('all', [ProductController::class, 'index'])->name('admin.show.products');
    Route::post('all', [ProductController::class, 'index'])->name('admin.filter.products');
    Route::get('detail/{id}', [ProductController::class, 'detail'])->name('admin.show.product');
    Route::get('create', [ProductController::class, 'loadFormCreate'])->name('admin.show.create.product');
    Route::post('create', [ProductController::class, 'create'])->name('admin.create.product');
    Route::get('edit/{id}', [ProductController::class, 'loadFormEdit'])->name('admin.show.edit.product');
    Route::put('edit/{id}', [ProductController::class, 'edit'])->name('admin.edit.product');
    Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('admin.delete.product');
});
