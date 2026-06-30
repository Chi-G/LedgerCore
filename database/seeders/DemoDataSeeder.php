<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Account;
use App\Services\LedgerService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        $ledgerService = app(LedgerService::class);
        $pin = Hash::make('1234');

        // Create Users
        $customer = User::factory()->create([
            'name' => 'Chibuike Customer',
            'email' => 'customer@example.com',
            'role' => 'customer',
            'transaction_pin' => $pin,
        ]);

        $teller = User::factory()->create([
            'name' => 'Ifeoma Teller',
            'email' => 'teller@example.com',
            'role' => 'teller',
            'transaction_pin' => $pin,
        ]);

        User::factory()->create([
            'name' => 'Sunday Auditor',
            'email' => 'auditor@example.com',
            'role' => 'auditor',
            'transaction_pin' => $pin,
        ]);

        User::factory()->create([
            'name' => 'Kunle Manager',
            'email' => 'manager@example.com',
            'role' => 'manager',
            'transaction_pin' => $pin,
        ]);

        // Create Accounts for the main customer
        $account1 = Account::factory()->create([
            'user_id' => $customer->id,
            'account_number' => '0012345678',
            'type' => 'savings',
        ]);

        $account2 = Account::factory()->create([
            'user_id' => $customer->id,
            'account_number' => '0098765432',
            'type' => 'current',
        ]);

        $allAccounts = collect([$account1, $account2]);

        $this->command->info('Creating 1000 random customers...');
        // Create 1000 random customers
        $randomCustomers = User::factory()->count(1000)->create([
            'role' => 'customer',
            'transaction_pin' => $pin,
        ]);

        $this->command->info('Creating accounts for the 1000 customers...');
        // Create an account for each random customer
        foreach ($randomCustomers as $randomCustomer) {
            $allAccounts->push(Account::factory()->create([
                'user_id' => $randomCustomer->id,
                'type' => 'savings',
            ]));
        }

        // Seed 1000 transactions
        $this->command->info('Seeding 1000 transaction records across all accounts. This might take a few moments...');
        
        // Initial large deposit for the main customer
        $ledgerService->recordDeposit(
            $account1,
            5000000.00,
            'DEP-' . strtoupper(Str::random(10)) . ' - Initial Large Deposit'
        );

        $ledgerService->recordDeposit(
            $account2,
            5000000.00,
            'DEP-' . strtoupper(Str::random(10)) . ' - Initial Large Deposit'
        );

        // Give initial balance to a few random accounts so transfers don't fail as often
        foreach ($allAccounts->random(50) as $acc) {
             $ledgerService->recordDeposit(
                $acc,
                100000.00,
                'DEP-' . strtoupper(Str::random(10)) . ' - Initial Deposit'
            );
        }

        for ($i = 0; $i < 998; $i++) {
            $type = rand(1, 10);
            $amount = rand(100, 5000) + (rand(0, 99) / 100);
            
            // Pick random accounts for the transaction
            $randomAcc = $allAccounts->random();
            
            if ($type <= 3) {
                // Deposit
                $ledgerService->recordDeposit(
                    $randomAcc,
                    $amount,
                    'DEP-' . strtoupper(Str::random(10)) . ' - Automated Deposit'
                );
            } elseif ($type <= 6) {
                // Withdrawal
                try {
                    $ledgerService->recordWithdrawal(
                        $randomAcc,
                        $amount,
                        'WDW-' . strtoupper(Str::random(10)) . ' - ATM Withdrawal'
                    );
                } catch (\App\Exceptions\InsufficientFundsException $e) {
                    // Ignore insufficient funds during random seeding
                }
            } else {
                // Transfer
                $randomAcc2 = $allAccounts->where('id', '!=', $randomAcc->id)->random();
                try {
                    $ledgerService->recordTransfer(
                        $randomAcc,
                        $randomAcc2,
                        $amount,
                        'TRF-' . strtoupper(Str::random(10)) . ' - Transfer between accounts'
                    );
                } catch (\App\Exceptions\InsufficientFundsException $e) {
                    // Ignore
                }
            }
        }
        
        $this->command->info('Successfully seeded demo users, accounts, and 1000 transactions.');
    }
}
