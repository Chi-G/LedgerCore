<?php

namespace App\Policies;

use App\Models\Account;
use App\Models\User;

class AccountPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Account $account): bool
    {
        return in_array($user->role, ['manager', 'auditor', 'teller']) || $account->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return $user->role === 'manager';
    }
}
