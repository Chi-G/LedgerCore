<?php

namespace App\Listeners;

use App\Events\TransferCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogTransferNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     */
    public function handle(TransferCompleted $event): void
    {
        // This runs asynchronously in the background so it doesn't block the HTTP request.
        // In a real application, this is where you would call an Email Service API,
        // SMS Gateway, or Push Notification Service.

        $message = 'Async Event Processed: Transfer of ₦'.number_format($event->amount, 2)." [Ref: {$event->reference}] completed successfully.";

        if ($event->fromAccount && $event->toAccount) {
            $message .= " From: {$event->fromAccount->account_number} To: {$event->toAccount->account_number}";
        } elseif ($event->toAccount) {
            $message .= " Deposit To: {$event->toAccount->account_number}";
        } elseif ($event->fromAccount) {
            $message .= " Withdrawal From: {$event->fromAccount->account_number}";
        }

        Log::info($message);
    }
}
