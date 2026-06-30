<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        /** @var User $user */
        $user = $request->user();
        if ($user->role === 'teller') {
            $totalDeposits = \App\Models\LedgerEntry::query()->where('direction', '=', 'credit', 'and')
                ->where('type', '=', 'deposit', 'and')
                ->whereDate('created_at', '=', now()->toDateString(), 'and')
                ->sum('amount');

            $totalWithdrawals = \App\Models\LedgerEntry::query()->where('direction', '=', 'debit', 'and')
                ->where('type', '=', 'withdrawal', 'and')
                ->whereDate('created_at', '=', now()->toDateString(), 'and')
                ->sum('amount');

            $activeAccountsCount = \App\Models\Account::query()->count('*');

            $recentTransactions = \App\Models\LedgerEntry::query()->with('account')
                ->orderByDesc('created_at')
                ->take(10)
                ->get();

            return view('staff.dashboard', compact('totalDeposits', 'totalWithdrawals', 'activeAccountsCount', 'recentTransactions'));
        }

        $account = $user->accounts()->first();

        if (! $account) {
            abort(404, 'No accounts found in the database. Please run the seeder or tests.');
        }

        $range = $request->query('range', 'month');

        $entriesQuery = $account->ledgerEntries()->orderByDesc('created_at');

        match ($range) {
            'week' => $entriesQuery->where('created_at', '>=', now()->startOfWeek()),
            'month' => $entriesQuery->where('created_at', '>=', now()->startOfMonth()),
            default => null,
        };

        $entries = $entriesQuery->take(10)->get();

        $monthlyCredits = $account->ledgerEntries()
            ->where('direction', 'credit')
            ->where('created_at', '>=', now()->startOfMonth())
            ->sum('amount');

        $monthlyDebits = $account->ledgerEntries()
            ->where('direction', 'debit')
            ->where('created_at', '>=', now()->startOfMonth())
            ->sum('amount');

        return view('dashboard', [
            'account' => $account,
            'balance' => $account->balance(),
            'entries' => $entries,
            'monthlyCredits' => $monthlyCredits,
            'monthlyDebits' => $monthlyDebits,
            'pendingTransfersCount' => 0,
        ]);
    }
}
