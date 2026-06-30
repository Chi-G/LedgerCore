<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Services\LedgerService;
use Illuminate\Support\Str;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $ledgerService = app(LedgerService::class);
        $accounts = Account::all();
        
        $this->command->info('Ensuring all accounts have 35 transactions...');
        
        foreach ($accounts as $acc) {
            $count = $acc->ledgerEntries()->count();
            
            if ($count >= 35) {
                continue;
            }
            
            $needed = 35 - $count;
            
            for ($i = 0; $i < $needed; $i++) {
                $type = rand(1, 10);
                $amount = rand(100, 1000) + (rand(0, 99) / 100);
                
                if ($type <= 4) {
                    $ledgerService->recordDeposit(
                        $acc,
                        $amount,
                        'DEP-' . strtoupper(Str::random(10)) . ' - Automated Deposit'
                    );
                } elseif ($type <= 7) {
                    try {
                        $ledgerService->recordWithdrawal(
                            $acc,
                            $amount,
                            'WDW-' . strtoupper(Str::random(10)) . ' - ATM Withdrawal'
                        );
                    } catch (\App\Exceptions\InsufficientFundsException $e) {
                        $ledgerService->recordDeposit(
                            $acc,
                            $amount,
                            'DEP-' . strtoupper(Str::random(10)) . ' - Fallback Deposit'
                        );
                    }
                } else {
                    $randomAcc2 = $accounts->where('id', '!=', $acc->id)->random();
                    if ($randomAcc2) {
                        try {
                            $ledgerService->recordTransfer(
                                $acc,
                                $randomAcc2,
                                $amount,
                                'TRF-' . strtoupper(Str::random(10)) . ' - Transfer'
                            );
                        } catch (\App\Exceptions\InsufficientFundsException $e) {
                            $ledgerService->recordDeposit(
                                $acc,
                                $amount,
                                'DEP-' . strtoupper(Str::random(10)) . ' - Fallback Deposit'
                            );
                        }
                    } else {
                        $ledgerService->recordDeposit(
                            $acc,
                            $amount,
                            'DEP-' . strtoupper(Str::random(10)) . ' - Fallback Deposit'
                        );
                    }
                }
            }
        }
        
        $this->command->info('Done seeding transactions!');
    }
}
