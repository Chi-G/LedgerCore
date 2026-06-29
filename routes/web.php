<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\TransferController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// customer Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
    Route::get('/transfers', [TransferController::class, 'index'])->name('transfers.index');
    Route::post('/transfers', [TransferController::class, 'store'])->name('transfers.store');
    Route::get('/statements', [StatementController::class, 'index'])->name('statements.index');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/audit', [AuditController::class, 'index'])->name('audit.index');
    Route::get('/settings/sessions', [\App\Http\Controllers\SessionController::class, 'index'])->name('sessions.index');
    Route::delete('/settings/sessions/{id}', [\App\Http\Controllers\SessionController::class, 'destroy'])->name('sessions.destroy');
});

// teller Dashboard
Route::prefix('teller')->middleware('auth')->name('teller.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
    Route::get('/transfers', [TransferController::class, 'index'])->name('transfers.index');
    Route::post('/transfers', [TransferController::class, 'store'])->name('transfers.store');
});
