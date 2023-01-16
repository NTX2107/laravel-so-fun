<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\web\HomeController;
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

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {
    require_once __DIR__ . '/admin.php';
});

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('register', [AuthController::class, 'showRegister'])->name('show.register');
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::prefix('categories')->group(function () {
    Route::get('', [CategoryController::class, 'getListCategories'])->name('show.all.categories');
    Route::put('{id}', [CategoryController::class, 'editCategory'])->name('edit.category');
    Route::delete('{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');
});

Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');
