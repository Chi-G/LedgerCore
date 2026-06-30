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
        $this->call([
            DemoDataSeeder::class,
            TransactionSeeder::class,
        ]);
    }
}
