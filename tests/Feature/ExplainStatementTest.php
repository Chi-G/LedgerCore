<?php

use App\Models\User;
use App\Models\LedgerEntry;

it('explains a statement as manager', function () {
    /** @var Tests\TestCase $this */
    /** @var User $manager */
    $manager = User::factory()->create(['role' => 'manager']);
    $entry = LedgerEntry::factory()->create();

    $response = $this->actingAs($manager)
        ->postJson(route('manager.statements.explain', $entry));

    dump($response->status(), $response->getContent());
    $response->assertOk();
});
