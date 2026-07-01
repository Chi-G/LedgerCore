<?php

namespace App\Policies;

use App\Models\User;

class TransferPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['customer', 'teller']);
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['customer', 'teller']);
    }

    public function analyze(User $user): bool
    {
        return in_array($user->role, ['customer', 'teller', 'manager']);
    }
}
