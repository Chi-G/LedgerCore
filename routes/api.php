<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AccountController;

// Since we are not fully using sanctum for these Pest tests yet (we are using $this->actingAs),
// we will just register the route, but in reality it might be behind auth:sanctum.
// We'll wrap it in auth middleware.
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/accounts/{account}', [AccountController::class, 'show'])->name('accounts.show');
    Route::get('/accounts/{account}/transactions', [\App\Http\Controllers\Api\TransactionHistoryController::class, 'index'])->name('accounts.transactions.index');
    Route::get('/reports/dormant-customers', [\App\Http\Controllers\Api\ReportsController::class, 'dormantCustomers'])->name('reports.dormant');
});
