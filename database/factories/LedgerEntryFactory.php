<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Account;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LedgerEntry>
 */
class LedgerEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_id' => Account::factory(),
            'direction' => 'credit',
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'type' => 'deposit',
            'reference' => $this->faker->unique()->uuid(),
        ];
    }

    public function credit(): self
    {
        return $this->state(fn (array $attributes) => [
            'direction' => 'credit',
        ]);
    }

    public function debit(): self
    {
        return $this->state(fn (array $attributes) => [
            'direction' => 'debit',
        ]);
    }
}
