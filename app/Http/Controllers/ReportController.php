<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        
        if (!in_array($user->role, ['manager', 'auditor'])) {
            abort(403, 'Unauthorized. Only managers and auditors can access this report.');
        }

        $dormantCustomers = collect(DB::table('users')
            ->join('accounts', 'users.id', '=', 'accounts.user_id')
            ->leftJoin('ledger_entries', function ($join) {
                $join->on('accounts.id', '=', 'ledger_entries.account_id')
                     ->whereMonth('ledger_entries.created_at', now()->month);
            })
            ->select('users.name', 'users.email', DB::raw('COUNT(ledger_entries.id) as txn_count'))
            ->where('users.role', 'customer')
            ->groupBy('users.id', 'users.name', 'users.email')
            ->get());

        return view('reports.index', compact('dormantCustomers'));
    }
}
