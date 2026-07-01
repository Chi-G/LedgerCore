<?php

namespace App\Services;

use App\Exceptions\InsufficientFundsException;
use App\Models\Account;
use App\Models\LedgerEntry;
use Illuminate\Support\Facades\DB;

class LedgerService
{
    public function recordTransfer(Account $from, Account $to, float $amount, string $reference, ?string $idempotencyKey = null): void
    {
        DB::transaction(function () use ($from, $to, $amount, $reference, $idempotencyKey) {
            $lockedFrom = Account::query()->where('id', '=', $from->id, 'and')->lockForUpdate()->first();

            if ($lockedFrom->balance() < $amount) {
                throw new InsufficientFundsException;
            }

            LedgerEntry::create([
                'account_id' => $from->id,
                'direction' => 'debit',
                'amount' => $amount,
                'type' => 'transfer',
                'reference' => $reference.'-debit',
                'idempotency_key' => $idempotencyKey,
                'hash' => $this->generateHash($from->id, 'debit', $amount, $reference.'-debit'),
            ]);

            LedgerEntry::create([
                'account_id' => $to->id,
                'direction' => 'credit',
                'amount' => $amount,
                'type' => 'transfer',
                'reference' => $reference.'-credit',
            ]);
        });
    }

    public function recordDeposit(Account $to, float $amount, string $reference, ?string $idempotencyKey = null): void
    {
        DB::transaction(function () use ($to, $amount, $reference, $idempotencyKey) {
            LedgerEntry::create([
                'account_id' => $to->id,
                'direction' => 'credit',
                'amount' => $amount,
                'type' => 'deposit',
                'reference' => $reference,
                'idempotency_key' => $idempotencyKey,
                'hash' => $this->generateHash($to->id, 'credit', $amount, $reference),
            ]);
        });
    }

    public function recordWithdrawal(Account $from, float $amount, string $reference, ?string $idempotencyKey = null): void
    {
        DB::transaction(function () use ($from, $amount, $reference, $idempotencyKey) {
            $lockedFrom = Account::query()->where('id', '=', $from->id, 'and')->lockForUpdate()->first();

            if ($lockedFrom->balance() < $amount) {
                throw new InsufficientFundsException;
            }

            LedgerEntry::create([
                'account_id' => $from->id,
                'direction' => 'debit',
                'amount' => $amount,
                'type' => 'withdrawal',
                'reference' => $reference,
                'idempotency_key' => $idempotencyKey,
                'hash' => $this->generateHash($from->id, 'debit', $amount, $reference),
            ]);
        });
    }

    private function generateHash($accountId, $direction, $amount, $reference): string
    {
        $lastHash = LedgerEntry::latest('id')->value('hash') ?? 'genesis_block';

        return hash('sha256', $lastHash.$accountId.$direction.$amount.$reference);
    }
}
