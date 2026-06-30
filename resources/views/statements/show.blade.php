@extends('layouts.app')

@section('title', 'LedgerCore — Transaction Receipt')

@push('styles')
<style>
    @media print {
        body {
            background-color: white !important;
            color: black !important;
        }
        /* Hide layout elements that shouldn't be printed */
        aside, nav, header, footer, .no-print, [x-show="showLogoutModal"] {
            display: none !important;
        }
        /* Remove margins/padding for printing */
        main {
            padding: 0 !important;
            margin: 0 !important;
        }
        .receipt-container {
            box-shadow: none !important;
            border: none !important;
            width: 100% !important;
            max-width: none !important;
        }
    }
</style>
@endpush

@section('content')
    <div class="max-w-2xl mx-auto mb-8 no-print flex justify-between items-center">
        <a href="{{ url()->previous() }}" class="text-sm font-mono text-ink/70 hover:text-ink transition-colors flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
            </svg>
            Back to Statements
        </a>
        <button onclick="const oldTitle = document.title; document.title = 'LedgerCore-Statement-{{ str_pad($entry->id, 8, '0', STR_PAD_LEFT) }}'; window.print(); document.title = oldTitle;" class="bg-brass hover:bg-brass-soft text-ink font-mono font-medium py-2 px-6 uppercase tracking-widest text-sm transition-colors cursor-pointer flex items-center gap-2 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.92-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
            </svg>
            Print Receipt
        </button>
    </div>

    <!-- Receipt Container -->
    <div class="receipt-container max-w-2xl mx-auto bg-white border border-ink/10 shadow-sm p-8 md:p-12 relative overflow-hidden">
        <!-- Logo / Bank Header -->
        <div class="text-center border-b-2 border-dashed border-ink/20 pb-8 mb-8">
            <h1 class="font-display font-medium text-4xl tracking-tight text-ink mb-1">LedgerCore Bank</h1>
            <p class="font-mono text-sm text-muted uppercase tracking-widest">Transaction Receipt</p>
        </div>

        <!-- Main Details -->
        <div class="space-y-6">
            <div class="flex justify-between items-center pb-4 border-b border-ink/5">
                <span class="font-mono text-xs uppercase tracking-widest text-muted">Statement ID</span>
                <span class="font-mono text-sm font-medium text-ink">#{{ str_pad($entry->id, 8, '0', STR_PAD_LEFT) }}</span>
            </div>

            <div class="flex justify-between items-center pb-4 border-b border-ink/5">
                <span class="font-mono text-xs uppercase tracking-widest text-muted">Transaction Type</span>
                <span class="font-mono text-sm font-medium uppercase text-ink">{{ $entry->type }}</span>
            </div>

            <div class="flex justify-between items-center pb-4 border-b border-ink/5">
                <span class="font-mono text-xs uppercase tracking-widest text-muted">Reference</span>
                <span class="font-mono text-sm text-ink">{{ $entry->reference }}</span>
            </div>

            <div class="flex justify-between items-center pb-4 border-b border-ink/5">
                <span class="font-mono text-xs uppercase tracking-widest text-muted">Date & Time</span>
                <span class="font-mono text-sm text-ink">{{ $entry->created_at->format('F d, Y \a\t h:i A') }}</span>
            </div>

            <div class="flex justify-between items-center pb-4 border-b border-ink/5">
                <span class="font-mono text-xs uppercase tracking-widest text-muted">
                    {{ $entry->direction === 'debit' ? 'From Account' : 'To Account' }}
                </span>
                <span class="font-mono text-sm text-ink">{{ $entry->account->account_number }}</span>
            </div>

            @if($entry->type === 'transfer')
                @if($entry->direction === 'credit' && $entry->sender)
                <div class="flex justify-between items-center pb-4 border-b border-ink/5">
                    <span class="font-mono text-xs uppercase tracking-widest text-muted">From Sender</span>
                    <span class="font-mono text-sm text-ink text-right">
                        {{ optional($entry->sender->user)->name ?? 'Unknown' }}<br>
                        <span class="text-xs text-muted">{{ $entry->sender->account_number }}</span>
                    </span>
                </div>
                @elseif($entry->direction === 'debit' && $entry->recipient)
                <div class="flex justify-between items-center pb-4 border-b border-ink/5">
                    <span class="font-mono text-xs uppercase tracking-widest text-muted">To Recipient</span>
                    <span class="font-mono text-sm text-ink text-right">
                        {{ optional($entry->recipient->user)->name ?? 'Unknown' }}<br>
                        <span class="text-xs text-muted">{{ $entry->recipient->account_number }}</span>
                    </span>
                </div>
                @endif
            @endif
            
            <div class="flex justify-between items-center pb-4 border-b border-ink/5">
                <span class="font-mono text-xs uppercase tracking-widest text-muted">Direction</span>
                <span class="font-mono text-sm uppercase {{ $entry->direction === 'credit' ? 'text-ledger-green' : 'text-ledger-rust' }}">
                    {{ $entry->direction }}
                </span>
            </div>
        </div>

        <!-- Amount Section -->
        <div class="mt-8 pt-8 border-t-2 border-dashed border-ink/20 text-center">
            <div class="font-mono text-xs uppercase tracking-widest text-muted mb-2">Transaction Amount</div>
            <div class="font-mono text-4xl font-medium {{ $entry->direction === 'credit' ? 'text-ledger-green' : 'text-ledger-rust' }}">
                {{ $entry->direction === 'credit' ? '+' : '-' }}₦{{ number_format($entry->amount, 2) }}
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-12 text-center text-xs font-mono text-muted uppercase tracking-[0.16em]">
            <p>Thank you for banking with LedgerCore.</p>
            <p class="mt-1 opacity-70">Generated on {{ now()->format('M d, Y H:i:s') }}</p>
        </div>
    </div>
@endsection
