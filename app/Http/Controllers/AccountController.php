<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if (in_array($user->role, ['teller', 'auditor', 'manager'])) {

            $query = Account::with('user');

            if ($request->filled('account_number')) {
                $query->where('account_number', 'like', '%' . $request->account_number . '%');
            }

            if ($request->filled('account_name')) {
                $query->whereHas('user', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->account_name . '%');
                });
            }

            $accounts = $query->paginate(10)->appends($request->all());
        } else {
            $accounts = $user->accounts;
        }

        return view('accounts.index', compact('accounts'));
    }
}
