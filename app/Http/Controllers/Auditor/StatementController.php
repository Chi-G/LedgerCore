<?php

namespace App\Http\Controllers\Auditor;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    public function index(Request $request)
    {
        $accountQuery = $request->query('account_number');
        $selectedAccount = null;
        $paginatedEntries = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);

        if ($accountQuery) {
            $selectedAccount = Account::where('account_number', $accountQuery)->first();

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

                $paginatedEntries = $entriesQuery->paginate(10);
                $paginatedEntries->appends($request->all());
            }
        }

        return view('statements.staff_index', [
            'entries' => $paginatedEntries,
            'selectedAccount' => $selectedAccount,
            'accountQuery' => $accountQuery,
        ]);
    }
}
