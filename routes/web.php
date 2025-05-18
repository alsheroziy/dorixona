<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;

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

// Bosh sahifa
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin panel
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    // Kategoriyalar
    Route::resource('categories', CategoryController::class);

    // Mahsulotlar
    Route::resource('products', ProductController::class);

    // Sotuvlar
    Route::resource('sales', SaleController::class);

    // Yetkazib beruvchilar
    Route::resource('suppliers', SupplierController::class);

    // Hisobotlar
    Route::get('reports', [ReportController::class, 'index'])->name('reports');

    // Sozlamalar
    Route::get('settings', [SettingController::class, 'index'])->name('settings');
});

// Default welcome route
Route::get('/', function () {
    return view('welcome');
});
