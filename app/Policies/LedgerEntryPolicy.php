<?php

namespace App\Policies;

use App\Models\LedgerEntry;
use App\Models\User;

class LedgerEntryPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['auditor', 'manager', 'customer']);
    }

    public function view(User $user, LedgerEntry $entry): bool
    {
        if (in_array($user->role, ['auditor', 'manager'])) {
            return true;
        }

        // Customers can only view their own entries
        return $entry->account && $entry->account->user_id === $user->id;
    }

    public function explain(User $user, LedgerEntry $entry): bool
    {
        return $user->role === 'manager';
    }
}
