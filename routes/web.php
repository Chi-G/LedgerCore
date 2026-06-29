<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/accounts', [\App\Http\Controllers\AccountController::class, 'index'])->name('accounts.index');
    Route::get('/transfers', [\App\Http\Controllers\TransferController::class, 'index'])->name('transfers.index');
    Route::post('/transfers', [\App\Http\Controllers\TransferController::class, 'store'])->name('transfers.store');
    Route::get('/statements', [\App\Http\Controllers\StatementController::class, 'index'])->name('statements.index');
    Route::get('/reports', [\App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
    Route::get('/audit', [\App\Http\Controllers\AuditController::class, 'index'])->name('audit.index');
});
