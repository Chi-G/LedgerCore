<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $customer = User::factory()->create([
            'name' => 'Test Customer',
            'email' => 'customer@example.com',
            'role' => 'customer',
        ]);
        User::factory()->create([
            'name' => 'Test Teller',
            'email' => 'teller@example.com',
            'role' => 'teller',
        ]);
        User::factory()->create([
            'name' => 'Test Auditor',
            'email' => 'auditor@example.com',
            'role' => 'auditor',
        ]);
        User::factory()->create([
            'name' => 'Test Manager',
            'email' => 'manager@example.com',
            'role' => 'manager',
        ]);

        // Seed some data for the premium dashboard preview
        $account = \App\Models\Account::factory()->create([
            'user_id' => $customer->id,
            'account_number' => '0012345678',
            'type' => 'savings',
        ]);

        \App\Models\LedgerEntry::factory()->create([
            'account_id' => $account->id,
            'direction' => 'credit',
            'amount' => 150000.00,
            'type' => 'deposit',
            'reference' => 'DEP-'.uniqid(),
            'created_at' => now()->subDays(5),
        ]);
        
        \App\Models\LedgerEntry::factory()->create([
            'account_id' => $account->id,
            'direction' => 'debit',
            'amount' => 25000.00,
            'type' => 'withdrawal',
            'reference' => 'WTH-'.uniqid(),
            'created_at' => now()->subDays(2),
        ]);

        \App\Models\LedgerEntry::factory()->create([
            'account_id' => $account->id,
            'direction' => 'credit',
            'amount' => 5000.00,
            'type' => 'transfer',
            'reference' => 'TRF-IN-'.uniqid(),
            'created_at' => now()->subHours(10),
        ]);
    }
}
