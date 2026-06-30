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

        $totalDeposits = LedgerEntry::query()
            ->where('direction', '=', 'credit', 'and')
            ->whereDate('created_at', '=', $today, 'and')
            ->sum('amount');

        $totalWithdrawals = LedgerEntry::query()
            ->where('direction', '=', 'debit', 'and')
            ->whereDate('created_at', '=', $today, 'and')
            ->sum('amount');

        $activeAccountsCount = Account::query()->count('*');
        $recentTransactions = LedgerEntry::query()->with('account')->latest()->take(10)->get();

        return view('manager.dashboard', compact(
            'totalDeposits',
            'totalWithdrawals',
            'activeAccountsCount',
            'recentTransactions'
        ));
    }
}
