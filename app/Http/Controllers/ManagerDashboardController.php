<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role !== 'manager') {
            abort(403, 'Unauthorized.');
        }

        // Manager metrics: overview of branch operations
        $totalDeposits = \App\Models\LedgerEntry::where('direction', 'credit')
            ->where('type', 'deposit')
            ->whereDate('created_at', now()->toDateString())
            ->sum('amount');

        $totalWithdrawals = \App\Models\LedgerEntry::where('direction', 'debit')
            ->where('type', 'withdrawal')
            ->whereDate('created_at', now()->toDateString())
            ->sum('amount');

        $activeAccountsCount = \App\Models\Account::count();

        $recentTransactions = \App\Models\LedgerEntry::with('account')
            ->orderByDesc('created_at')
            ->take(10)
            ->get();

        return view('manager.dashboard', compact(
            'totalDeposits', 
            'totalWithdrawals', 
            'activeAccountsCount', 
            'recentTransactions'
        ));
    }
}
