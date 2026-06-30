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
            $lockedFrom = Account::query()->where('id', '=', $from->id, 'and')->lockForUpdate()->first();

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

    public function recordDeposit(Account $to, float $amount, string $reference): void
    {
        DB::transaction(function () use ($to, $amount, $reference) {
            LedgerEntry::create([
                'account_id' => $to->id,
                'direction' => 'credit',
                'amount' => $amount,
                'type' => 'deposit',
                'reference' => $reference,
            ]);
        });
    }

    public function recordWithdrawal(Account $from, float $amount, string $reference): void
    {
        DB::transaction(function () use ($from, $amount, $reference) {
            $lockedFrom = Account::query()->where('id', '=', $from->id, 'and')->lockForUpdate()->first();

            if ($lockedFrom->balance() < $amount) {
                throw new InsufficientFundsException();
            }

            LedgerEntry::create([
                'account_id' => $from->id,
                'direction' => 'debit',
                'amount' => $amount,
                'type' => 'withdrawal',
                'reference' => $reference,
            ]);
        });
    }
}
