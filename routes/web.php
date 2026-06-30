<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\TransferController;
use App\Http\Middleware\VerifyCustomerUuid;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        if (in_array($user->role, ['teller', 'auditor', 'manager'])) {
            return redirect()->route($user->role.'.dashboard');
        }

        return redirect()->route('dashboard', ['uuid' => $user->uuid]);
    }

    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// global authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/settings/sessions', [SessionController::class, 'index'])->name('sessions.index');
    Route::delete('/settings/sessions/{id}', [SessionController::class, 'destroy'])->name('sessions.destroy');
});

// teller Dashboard
Route::prefix('teller')->middleware('auth')->name('teller.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
    Route::get('/transfers', [TransferController::class, 'index'])->name('transfers.index');
    Route::post('/transfers', [TransferController::class, 'store'])->name('transfers.store');
});

// auditor Dashboard
Route::prefix('auditor')->middleware('auth')->name('auditor.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Auditor\DashboardController::class, '__invoke'])->name('dashboard');
    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
    Route::get('/statements', [App\Http\Controllers\Auditor\StatementController::class, 'index'])->name('statements.index');
    Route::get('/statements/{entry}', [App\Http\Controllers\Auditor\StatementController::class, 'show'])->name('statements.show');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/audit', [AuditController::class, 'index'])->name('audit.index');
});

// manager Dashboard
Route::prefix('manager')->middleware('auth')->name('manager.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Manager\DashboardController::class, '__invoke'])->name('dashboard');
    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
    Route::get('/statements', [App\Http\Controllers\Manager\StatementController::class, 'index'])->name('statements.index');
    Route::get('/statements/{entry}', [App\Http\Controllers\Manager\StatementController::class, 'show'])->name('statements.show');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/audit', [AuditController::class, 'index'])->name('audit.index');
});

// customer Dashboard
Route::middleware(['auth', VerifyCustomerUuid::class])->prefix('{uuid}')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
    Route::get('/transfers', [TransferController::class, 'index'])->name('transfers.index');
    Route::post('/transfers', [TransferController::class, 'store'])->name('transfers.store');
    Route::get('/statements', [StatementController::class, 'index'])->name('statements.index');
    Route::get('/statements/{entry}', [StatementController::class, 'show'])->name('statements.show');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/audit', [AuditController::class, 'index'])->name('audit.index');
});
