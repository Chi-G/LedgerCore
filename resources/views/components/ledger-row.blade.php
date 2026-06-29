{{--
    resources/views/components/ledger-row.blade.php
    Usage: <x-ledger-row :entry="$entry" />
    Expects $entry to have: reference, description, type, direction ('credit'|'debit'), amount, created_at
--}}
@props(['entry'])

@php
    $isCredit = $entry->direction === 'credit';
@endphp

<div class="grid grid-cols-[10px_1fr_90px] lg:grid-cols-[14px_86px_1fr_130px_150px] items-center gap-3 lg:gap-4 px-5 lg:px-7 py-4 border-b border-[#EFEBE0] last:border-none hover:bg-[#FBFAF6] transition-colors">
    <span class="w-1.5 h-1.5 rounded-full {{ $isCredit ? 'bg-ledger-green' : 'bg-ledger-rust' }}"></span>

    <span class="hidden lg:inline font-mono text-[11.5px] text-[#8B8474]">{{ $entry->reference }}</span>

    <div>
        <div class="text-[13.5px] text-ink">{{ $entry->description }}</div>
        <div class="text-[11px] text-[#9C9486] font-mono mt-0.5 uppercase">
            {{ $isCredit ? 'CREDIT' : 'DEBIT' }} · {{ $entry->type }}
        </div>
    </div>

    <span class="hidden lg:inline font-mono text-[11.5px] text-[#9C9486]">
        {{ $entry->created_at->format('d M, H:i') }}
    </span>

    <span class="font-mono text-sm text-right font-medium whitespace-nowrap {{ $isCredit ? 'text-ledger-green' : 'text-ledger-rust' }}">
        {{ $isCredit ? '+' : '−' }}₦{{ number_format($entry->amount, 2) }}
    </span>
</div>
