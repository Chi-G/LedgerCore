<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\LedgerEntry;
use Illuminate\Http\Request;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Support\Facades\Gate;

class StatementController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('viewAny', LedgerEntry::class);
        $user = $request->user();

        // Allowed accounts for dropdown
        if (in_array($user->role, ['auditor', 'manager'])) {
            $accounts = Account::all();
        } else {
            $accounts = $user->accounts;
        }

        // If no account selected, default to the first one they have access to
        $accountId = $request->query('account');
        $selectedAccount = $accountId ? $accounts->firstWhere('id', $accountId) : $accounts->first();

        if (! $selectedAccount) {
            return view('statements.index', ['entries' => new CursorPaginator([], 15), 'accounts' => $accounts, 'selectedAccount' => null]);
        }

        // If they requested an account they don't have access to
        if ($accountId && ! $selectedAccount) {
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

        $entries = $entriesQuery->cursorPaginate(15);

        // Preserve query parameters for pagination
        $entries->appends($request->all());

        return view('statements.index', compact('entries', 'accounts', 'selectedAccount'));
    }

    public function show(Request $request, string $uuid, LedgerEntry $entry)
    {
        Gate::authorize('view', $entry);

        return view('statements.show', compact('entry'));
    }
}
