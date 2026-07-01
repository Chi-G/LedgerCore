<?php

use App\Models\User;
use App\Models\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('customer gets 403 trying to view another customers account', function () {
    $customer1 = User::factory()->create(['role' => 'customer']);
    $customer2 = User::factory()->create(['role' => 'customer']);
    $account = Account::factory()->create(['user_id' => $customer2->id]);

    /** @var Tests\TestCase $this */
    /** @var User $customer1 */
    $this->actingAs($customer1)
        ->getJson("/api/accounts/{$account->id}")
        ->assertForbidden();
});

test('customer can view own account', function () {
    $customer = User::factory()->create(['role' => 'customer']);
    $account = Account::factory()->create(['user_id' => $customer->id]);

    /** @var Tests\TestCase $this */
    /** @var User $customer */
    $this->actingAs($customer)
        ->getJson("/api/accounts/{$account->id}")
        ->assertSuccessful();
});

test('auditor can view any account', function () {
    $auditor = User::factory()->create(['role' => 'auditor']);
    $customer = User::factory()->create(['role' => 'customer']);
    $account = Account::factory()->create(['user_id' => $customer->id]);

    /** @var Tests\TestCase $this */
    /** @var User $auditor */
    $this->actingAs($auditor)
        ->getJson("/api/accounts/{$account->id}")
        ->assertSuccessful();
});
