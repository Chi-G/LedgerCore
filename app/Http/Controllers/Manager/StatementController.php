<?php

namespace App\Http\Controllers\Manager;

use App\Ai\Agents\LedgerExplainer;
use App\Http\Controllers\Controller;
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

        $accountQuery = $request->query('account_number');
        $selectedAccount = null;
        $paginatedEntries = new CursorPaginator([], 15);

        if ($accountQuery) {
            $selectedAccount = Account::query()->where('account_number', $accountQuery)->first();

            if ($selectedAccount) {
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

                $paginatedEntries = $entriesQuery->cursorPaginate(15);
                $paginatedEntries->appends($request->all());
            }
        }

        return view('statements.staff_index', [
            'entries' => $paginatedEntries,
            'selectedAccount' => $selectedAccount,
            'accountQuery' => $accountQuery,
        ]);
    }

    public function show(LedgerEntry $entry)
    {
        Gate::authorize('view', $entry);

        return view('statements.show', compact('entry'));
    }

    public function explain(LedgerEntry $entry)
    {
        Gate::authorize('explain', $entry);

        $agent = new LedgerExplainer;

        $details = [
            'id' => $entry->id,
            'type' => $entry->type,
            'direction' => $entry->direction,
            'amount' => $entry->amount,
            'reference' => $entry->reference,
            'account_number' => $entry->account->account_number ?? null,
            'account_owner' => $entry->account->user->name ?? null,
        ];

        $prompt = 'Explain this ledger entry: '.json_encode($details);

        $explanation = (string) $agent->prompt($prompt);

        return response()->json(['explanation' => trim($explanation)]);
    }
}
