{{--
    resources/views/components/balance-card.blade.php
    Usage: <x-balance-card :account="$account" :balance="$balance" />
--}}
<div class="bg-ink text-paper rounded-md p-8 pb-7 relative overflow-hidden">
    <div class="text-[11px] tracking-[0.16em] uppercase text-brass-soft font-mono">Available Balance</div>
    <div class="font-display text-5xl font-light mt-2.5 tracking-tight">
        ₦{{ number_format($balance, 2) }}
    </div>

    <div class="flex gap-7 mt-5 pt-4 border-t border-white/10">
        <div>
            <div class="text-[10.5px] text-muted uppercase tracking-[0.1em]">Account No.</div>
            <div class="font-mono text-[13px] mt-1">{{ $account->account_number }}</div>
        </div>
        <div>
            <div class="text-[10.5px] text-muted uppercase tracking-[0.1em]">Type</div>
            <div class="font-mono text-[13px] mt-1">{{ ucfirst($account->type) }}</div>
        </div>
        <div>
            <div class="text-[10.5px] text-muted uppercase tracking-[0.1em]">Status</div>
            <div class="font-mono text-[13px] mt-1">{{ $account->status ?? 'Active' }}</div>
        </div>
    </div>
</div>
