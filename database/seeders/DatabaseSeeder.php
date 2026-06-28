<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
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
    }
}
