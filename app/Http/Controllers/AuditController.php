<?php

namespace App\Http\Controllers;

use App\Models\LedgerEntry;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        
        if ($user->role !== 'auditor') {
            abort(403, 'Unauthorized. Only auditors can access the global audit trail.');
        }

        $entriesQuery = LedgerEntry::with('account.user')->orderByDesc('created_at');

        if ($request->filled('reference')) {
            $entriesQuery->where('reference', 'like', '%' . $request->reference . '%');
        }

        if ($request->filled('type')) {
            $entriesQuery->where('type', $request->type);
        }

        if ($request->filled('date')) {
            $entriesQuery->whereDate('created_at', $request->date);
        }

        if ($request->filled('account_number')) {
            $entriesQuery->whereHas('account', function ($query) use ($request) {
                $query->where('account_number', 'like', '%' . $request->account_number . '%');
            });
        }

        if ($request->filled('amount')) {
            $entriesQuery->where('amount', $request->amount);
        }

        if ($request->filled('account_name')) {
            $entriesQuery->whereHas('account.user', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->account_name . '%');
            });
        }

        $entries = $entriesQuery->paginate(30);
        $entries->appends($request->all());

        return view('audit.index', compact('entries'));
    }
}
