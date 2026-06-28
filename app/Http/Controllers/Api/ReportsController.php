<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function dormantCustomers(Request $request)
    {
        $user = $request->user();
        
        if (!in_array($user->role, ['manager', 'auditor'])) {
            abort(403, 'Unauthorized. Only managers and auditors can access this report.');
        }

        $report = DB::table('users')
            ->join('accounts', 'users.id', '=', 'accounts.user_id')
            ->leftJoin('ledger_entries', function ($join) {
                $join->on('accounts.id', '=', 'ledger_entries.account_id')
                     ->whereMonth('ledger_entries.created_at', now()->month);
            })
            ->select('users.name', DB::raw('COUNT(ledger_entries.id) as txn_count'))
            ->groupBy('users.id', 'users.name')
            ->get();

        return response()->json($report);  
    }
}
