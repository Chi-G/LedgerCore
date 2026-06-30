<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditorDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role !== 'auditor') {
            abort(403, 'Unauthorized.');
        }

        // Auditor metrics: total accounts, total entries today, recent audit trail
        $activeAccountsCount = \App\Models\Account::count();
        
        $totalEntriesToday = \App\Models\LedgerEntry::whereDate('created_at', now()->toDateString())->count();

        // High value transactions (e.g. over 1M)
        $highValueTransactions = \App\Models\LedgerEntry::with('account')
            ->where('amount', '>=', 1000000)
            ->whereDate('created_at', now()->toDateString())
            ->count();

        $recentTransactions = \App\Models\LedgerEntry::with('account')
            ->orderByDesc('created_at')
            ->take(10)
            ->get();

        return view('auditor.dashboard', compact(
            'activeAccountsCount', 
            'totalEntriesToday', 
            'highValueTransactions', 
            'recentTransactions'
        ));
    }
}
