<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\LedgerEntry;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $customer = User::factory()->create([
            'name' => 'Chibuike Customer',
            'email' => 'customer@example.com',
            'role' => 'customer',
        ]);
        User::factory()->create([
            'name' => 'Ifeoma Teller',
            'email' => 'teller@example.com',
            'role' => 'teller',
        ]);
        User::factory()->create([
            'name' => 'Sunday Auditor',
            'email' => 'auditor@example.com',
            'role' => 'auditor',
        ]);
        User::factory()->create([
            'name' => 'Kunle Manager',
            'email' => 'manager@example.com',
            'role' => 'manager',
        ]);

        // Seed some data for the premium dashboard preview
        $account = Account::factory()->create([
            'user_id' => $customer->id,
            'account_number' => '0012345678',
            'type' => 'savings',
        ]);

        LedgerEntry::factory()->create([
            'account_id' => $account->id,
            'direction' => 'credit',
            'amount' => 150000.00,
            'type' => 'deposit',
            'reference' => 'DEP-'.uniqid(),
            'created_at' => now()->subDays(5),
        ]);

        LedgerEntry::factory()->create([
            'account_id' => $account->id,
            'direction' => 'debit',
            'amount' => 25000.00,
            'type' => 'withdrawal',
            'reference' => 'WTH-'.uniqid(),
            'created_at' => now()->subDays(2),
        ]);

        LedgerEntry::factory()->create([
            'account_id' => $account->id,
            'direction' => 'credit',
            'amount' => 5000.00,
            'type' => 'transfer',
            'reference' => 'TRF-IN-'.uniqid(),
            'created_at' => now()->subHours(10),
        ]);
    }
}
