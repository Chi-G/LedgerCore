<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\LedgerEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $today = Carbon::today();

        $totalDeposits = LedgerEntry::where('direction', 'credit')
            ->whereDate('created_at', $today)
            ->sum('amount');

        $totalWithdrawals = LedgerEntry::where('direction', 'debit')
            ->whereDate('created_at', $today)
            ->sum('amount');

        $activeAccountsCount = Account::count();
        $recentTransactions = LedgerEntry::with('account')->latest()->paginate(10);

        return view('manager.dashboard', compact(
            'totalDeposits',
            'totalWithdrawals',
            'activeAccountsCount',
            'recentTransactions'
        ));
    }
}
