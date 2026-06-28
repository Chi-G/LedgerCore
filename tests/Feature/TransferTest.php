<?php

use App\Models\Account;
use App\Models\LedgerEntry;
use App\Services\LedgerService;
use App\Exceptions\InsufficientFundsException;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('transfer moves money correctly between two accounts', function () {
    $from = Account::factory()->create();
    $to = Account::factory()->create();
    LedgerEntry::factory()->credit()->for($from)->create(['amount' => 10000]);

    app(LedgerService::class)->recordTransfer($from, $to, 5000, 'ref-001');

    expect($from->balance())->toBe(5000.0);
    expect($to->balance())->toBe(5000.0);
});

test('transfer throws when funds are insufficient', function () {
    $from = Account::factory()->create();
    $to = Account::factory()->create();

    expect(fn () => app(LedgerService::class)->recordTransfer($from, $to, 5000, 'ref-002'))
        ->toThrow(InsufficientFundsException::class);
});
