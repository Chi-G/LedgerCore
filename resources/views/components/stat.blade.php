{{--
    resources/views/components/stat.blade.php
    Usage: <x-stat label="Credits — this month" value="₦212,000.00" tone="credit" />
    tone: credit | debit | neutral
--}}
@props(['label', 'value', 'tone' => 'neutral'])

@php
    $toneClass = match($tone) {
        'credit' => 'text-ledger-green',
        'debit' => 'text-ledger-rust',
        default => 'text-ink',
    };
@endphp

<div class="bg-white border border-[#E7E2D6] rounded-md px-5 py-4 flex justify-between items-center">
    <span class="text-[12px] text-[#6B6457]">{{ $label }}</span>
    <span class="font-mono text-lg font-medium {{ $toneClass }}">{{ $value }}</span>
</div>
