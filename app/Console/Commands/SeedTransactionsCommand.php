<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Account;
use App\Models\LedgerEntry;
use Illuminate\Support\Str;

class SeedTransactionsCommand extends Command
{
    protected $signature = 'db:seed-transactions';

    protected $description = 'Seed ledger transactions for all accounts';

    public function handle()
    {
        $accounts = Account::all();
        $this->info("Seeding transactions for {$accounts->count()} accounts...");

        $bar = $this->output->createProgressBar(count($accounts));
        $bar->start();

        foreach ($accounts as $account) {
            $numTransactions = rand(10, 20);

            for ($i = 0; $i < $numTransactions; $i++) {
                $type = ['deposit', 'withdrawal', 'transfer'][array_rand(['deposit', 'withdrawal', 'transfer'])];
                
                if ($type === 'deposit') {
                    $direction = 'credit';
                } elseif ($type === 'withdrawal') {
                    $direction = 'debit';
                } else {
                    $direction = ['credit', 'debit'][array_rand(['credit', 'debit'])];
                }

                $amount = rand(100, 50000) / 100;

                LedgerEntry::create([
                    'account_id' => $account->id,
                    'direction' => $direction,
                    'amount' => $amount,
                    'type' => $type,
                    'reference' => 'TXN-' . strtoupper(Str::random(10)),
                    'created_at' => now()->subDays(rand(0, 30))->subMinutes(rand(0, 1440))
                ]);
            }
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('Transactions seeded successfully.');
    }
}
