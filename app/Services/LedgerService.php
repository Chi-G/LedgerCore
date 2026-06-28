<?php

namespace App\Services;

use App\Models\Account;
use App\Models\LedgerEntry;
use Illuminate\Support\Facades\DB;
use App\Exceptions\InsufficientFundsException;

class LedgerService
{
    public function recordTransfer(Account $from, Account $to, float $amount, string $reference): void
    {
        DB::transaction(function () use ($from, $to, $amount, $reference) {
            $lockedFrom = Account::where('id', $from->id)->lockForUpdate()->first();

            if ($lockedFrom->balance() < $amount) {
                throw new InsufficientFundsException();
            }

            LedgerEntry::create([
                'account_id' => $from->id,
                'direction' => 'debit',
                'amount' => $amount,
                'type' => 'transfer',
                'reference' => $reference . '-debit',
            ]);

            LedgerEntry::create([
                'account_id' => $to->id,
                'direction' => 'credit',
                'amount' => $amount,
                'type' => 'transfer',
                'reference' => $reference . '-credit',
            ]);
        });
    }
}
