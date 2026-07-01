<?php

namespace App\Events;

use App\Models\Account;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TransferCompleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public ?Account $toAccount;

    public ?Account $fromAccount;

    public float $amount;

    public string $reference;

    /**
     * Create a new event instance.
     */
    public function __construct(?Account $toAccount, ?Account $fromAccount, float $amount, string $reference)
    {
        $this->toAccount = $toAccount;
        $this->fromAccount = $fromAccount;
        $this->amount = $amount;
        $this->reference = $reference;
    }
}
