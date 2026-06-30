<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role === 'teller') {
            abort(403, 'Unauthorized access.');
        }
        
        // Allowed accounts for dropdown
        if (in_array($user->role, ['auditor', 'manager'])) {
            $accounts = Account::all();
        } else {
            $accounts = $user->accounts;
        }

        // If no account selected, default to the first one they have access to
        $accountId = $request->query('account');
        $selectedAccount = $accountId ? $accounts->firstWhere('id', $accountId) : $accounts->first();

        if (!$selectedAccount) {
            return view('statements.index', ['entries' => new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10), 'accounts' => $accounts, 'selectedAccount' => null]);
        }

        // If they requested an account they don't have access to
        if ($accountId && !$selectedAccount) {
            abort(403, 'Unauthorized access to this account.');
        }

        $entriesQuery = $selectedAccount->ledgerEntries()->orderByDesc('created_at');

        if ($request->filled('from')) {
            $entriesQuery->whereDate('created_at', '>=', $request->from);
        }

        if ($request->filled('to')) {
            $entriesQuery->whereDate('created_at', '<=', $request->to);
        }

        if ($request->filled('type')) {
            $entriesQuery->where('type', $request->type);
        }

        $entries = $entriesQuery->paginate(10);
        
        // Preserve query parameters for pagination
        $entries->appends($request->all());

        return view('statements.index', compact('entries', 'accounts', 'selectedAccount'));
    }

    public function show(Request $request, string $uuid, \App\Models\LedgerEntry $entry)
    {
        $user = $request->user();

        if ($user->role === 'teller') {
            abort(403, 'Unauthorized access.');
        }

        // Verify the entry belongs to an account the user has access to
        if (!in_array($user->role, ['auditor', 'manager'])) {
            if (!$user->accounts()->where('accounts.id', $entry->account_id)->exists()) {
                abort(403, 'Unauthorized access to this statement record.');
            }
        }

        return view('statements.show', compact('entry'));
    }
}
