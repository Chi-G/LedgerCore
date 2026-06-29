<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if (in_array($user->role, ['auditor', 'manager'])) {
            $accounts = Account::with('user')->get();
        } else {
            $accounts = $user->accounts;
        }

        return view('accounts.index', compact('accounts'));
    }
}
