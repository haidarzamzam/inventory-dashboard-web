<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SerialNumberController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('role:super_admin')->group(function() {
        Route::resource('/product', ProductController::class);
        Route::resource('/product/{product_id}/serial', SerialNumberController::class);
        Route::get('/report', [ReportController::class, 'index'])->name('report.index');
        Route::get('/chart', [ChartController::class, 'index'])->name('chart.index');
    });
    
    Route::resource('/transaction', TransactionController::class);
    Route::resource('/transaction/{transaction_id}/detail', TransactionDetailController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
