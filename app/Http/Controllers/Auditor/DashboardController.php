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

        $highValueTransactions = LedgerEntry::where('amount', '>=', 10000)
            ->whereDate('created_at', $today)
            ->count();

        $totalEntriesToday = LedgerEntry::whereDate('created_at', $today)->count();
        $activeAccountsCount = Account::count();
        $recentTransactions = LedgerEntry::with('account')->latest()->paginate(10);

        return view('auditor.dashboard', compact(
            'highValueTransactions',
            'totalEntriesToday',
            'activeAccountsCount',
            'recentTransactions'
        ));
    }
}
