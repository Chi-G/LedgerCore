<?php

namespace App\Console\Commands;

use App\Models\LedgerEntry;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ReconcileLedger extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ledger:reconcile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reconciles the global ledger to ensure total credits equal total debits.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting global ledger reconciliation...');

        // Check 1: Internal transfers must be perfectly balanced
        $transferCredits = LedgerEntry::query()->where('type', 'transfer')->where('direction', 'credit')->sum('amount');
        $transferDebits = LedgerEntry::query()->where('type', 'transfer')->where('direction', 'debit')->sum('amount');

        $transferDiff = $transferCredits - $transferDebits;

        if (abs($transferDiff) > 0.001) {
            $message = "CRITICAL: Internal transfers are out of balance! Credits: $transferCredits, Debits: $transferDebits, Difference: $transferDiff";
            Log::emergency($message);
            $this->error($message);

            return 1;
        }

        // Check 2: Total System Liquidity must match total sum of user balances
        $totalDeposits = LedgerEntry::query()->where('type', 'deposit')->sum('amount');
        $totalWithdrawals = LedgerEntry::query()->where('type', 'withdrawal')->sum('amount');
        $expectedLiquidity = $totalDeposits - $totalWithdrawals;

        // Calculate actual sum of all balances
        $actualBalances = LedgerEntry::query()->where('direction', 'credit')->sum('amount')
                        - LedgerEntry::query()->where('direction', 'debit')->sum('amount');

        $liquidityDiff = $expectedLiquidity - $actualBalances;

        if (abs($liquidityDiff) > 0.001) {
            $message = "CRITICAL: System liquidity mismatch! Expected: $expectedLiquidity, Actual: $actualBalances";
            Log::emergency($message);
            $this->error($message);

            return 1;
        }

        $this->info('Ledger is perfectly balanced. Total System Liquidity: ₦'.number_format($expectedLiquidity, 2));

        return 0;
    }
}
