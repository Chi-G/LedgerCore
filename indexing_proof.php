<?php

use App\Models\Account;
use App\Models\LedgerEntry;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

echo "Seeding 100,000 records...\n";

$user = User::factory()->create();
$account = Account::factory()->create(['user_id' => $user->id]);

$records = [];
for ($i = 0; $i < 100000; $i++) {
    $records[] = [
        'account_id' => $account->id,
        'direction' => 'credit',
        'amount' => 10,
        'type' => 'deposit',
        'reference' => Str::uuid()->toString(),
        'created_at' => now()->subDays(rand(1, 100)),
        'updated_at' => now(),
    ];
    if (count($records) === 5000) {
        LedgerEntry::insert($records);
        $records = [];
    }
}

echo "Running EXPLAIN WITHOUT index...\n";
$explainWithout = DB::select("EXPLAIN SELECT * FROM ledger_entries IGNORE INDEX (ledger_entries_account_id_created_at_index) WHERE account_id = {$account->id} ORDER BY created_at DESC LIMIT 20");
file_put_contents('explain_without_index.json', json_encode($explainWithout, JSON_PRETTY_PRINT));

echo "Running EXPLAIN WITH index...\n";
$explainWith = DB::select("EXPLAIN SELECT * FROM ledger_entries FORCE INDEX (ledger_entries_account_id_created_at_index) WHERE account_id = {$account->id} ORDER BY created_at DESC LIMIT 20");
file_put_contents('explain_with_index.json', json_encode($explainWith, JSON_PRETTY_PRINT));

echo "Done.\n";
exit;
