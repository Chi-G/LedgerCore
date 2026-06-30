<?php

namespace App\Http\Controllers\Auditor;

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

        $highValueTransactions = LedgerEntry::query()
            ->where('amount', '>=', 100000, 'and')
            ->whereDate('created_at', '=', $today, 'and')
            ->count('*');
            
        $totalEntriesToday = LedgerEntry::query()->whereDate('created_at', '=', $today, 'and')->count('*');
        $activeAccountsCount = Account::query()->count('*');
        $recentTransactions = LedgerEntry::query()->with('account')->latest()->take(10)->get();

        return view('auditor.dashboard', compact(
            'highValueTransactions',
            'totalEntriesToday',
            'activeAccountsCount',
            'recentTransactions'
        ));
    }
}
