<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Http\Resources\TransactionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TransactionHistoryController extends Controller
{
    public function index(Request $request, Account $account)
    {
        Gate::authorize('view', $account);

        $entries = $account->ledgerEntries()
            ->when($request->filled('from'), fn ($q) => $q->whereDate('created_at', '>=', $request->from))
            ->when($request->filled('to'), fn ($q) => $q->whereDate('created_at', '<=', $request->to))
            ->when($request->filled('type'), fn ($q) => $q->where('type', $request->type))
            ->orderByDesc('created_at')
            ->paginate(20);

        return TransactionResource::collection($entries);
    }
}
