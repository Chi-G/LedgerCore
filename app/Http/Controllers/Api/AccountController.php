<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Http\Resources\AccountResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AccountController extends Controller
{
    public function show(Account $account)
    {
        Gate::authorize('view', $account);
        return new AccountResource($account);
    }
}
