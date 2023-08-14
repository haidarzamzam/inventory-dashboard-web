<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\SerialNumberController;
use App\Http\Controllers\TransactionController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// add auth check middleware
Route::get('/serial/{product_id}', [SerialNumberController::class, 'getByProduct'])->name('api.serial');
Route::get('/transaction/{type}', [TransactionController::class, 'getByType'])->name('api.transaction');

Route::controller(ReportController::class)
    ->prefix('/report')
    ->as('api.report.')
    ->group(function() {
        Route::get('/transaction/{type}', 'getTransactionByType');
    });
