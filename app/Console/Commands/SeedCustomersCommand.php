<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class SeedCustomersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:customers {count=1000 : The target total number of customer users}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed customer users up to a target count';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $targetCount = (int) $this->argument('count');
        $customerCount = User::where('role', 'customer')->count();

        $this->info("Current customer users: {$customerCount}");

        $needed = $targetCount - $customerCount;

        if ($needed > 0) {
            $this->info("Seeding {$needed} customer users...");

            $chunkSize = 100;
            $chunks = ceil($needed / $chunkSize);
            $bar = $this->output->createProgressBar($chunks);
            $bar->start();

            for ($i = 0; $i < $chunks; $i++) {
                $amountToCreate = min($chunkSize, $needed - ($i * $chunkSize));
                
                DB::transaction(function () use ($amountToCreate) {
                    $users = User::factory()->count($amountToCreate)->create([
                        'role' => 'customer',
                    ]);

                    foreach ($users as $user) {
                        Account::factory()->create([
                            'user_id' => $user->id,
                        ]);
                    }
                });
                
                $bar->advance();
            }

            $bar->finish();
            $this->newLine();
            $this->info("Done! Total customer users is now " . User::where('role', 'customer')->count());
        } else {
            $this->info("Already have {$customerCount} customer users.");
        }
    }
}
