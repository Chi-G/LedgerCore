<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if (! in_array($user->role, ['manager', 'auditor'])) {
            abort(403, 'Unauthorized. Only managers and auditors can access this report.');
        }

        $query = DB::table('users')
            ->join('accounts', 'users.id', '=', 'accounts.user_id')
            ->leftJoin('ledger_entries', function ($join) {
                $join->on('accounts.id', '=', 'ledger_entries.account_id')
                    ->whereMonth('ledger_entries.created_at', now()->month);
            })
            ->select('users.name', 'users.email', DB::raw('COUNT(ledger_entries.id) as txn_count'))
            ->where('users.role', 'customer')
            ->groupBy('users.id', 'users.name', 'users.email');

        if ($request->filled('name')) {
            $query->where('users.name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('email')) {
            $query->where('users.email', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('txn_count')) {
            $query->having('txn_count', '=', $request->txn_count);
        }

        if ($request->filled('status')) {
            if ($request->status === 'dormant') {
                $query->having('txn_count', '=', 0);
            } elseif ($request->status === 'active') {
                $query->having('txn_count', '>', 0);
            }
        }

        $dormantCustomers = $query->paginate(10)->appends($request->all());

        return view('reports.index', compact('dormantCustomers'));
    }
}
