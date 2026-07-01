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
    <div class="max-w-2xl mx-auto mb-4 sm:mb-8 no-print flex justify-between items-center">
        <a href="{{ url()->previous() }}" class="text-xs sm:text-sm font-mono text-ink/70 hover:text-ink transition-colors flex items-center gap-1 sm:gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3 sm:size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
            </svg>
            <span class="hidden sm:inline">Back to Statements</span>
            <span class="sm:hidden">Back</span>
        </a>
        <button onclick="const oldTitle = document.title; document.title = 'LedgerCore-Statement-{{ str_pad($entry->id, 8, '0', STR_PAD_LEFT) }}'; window.print(); document.title = oldTitle;" class="bg-brass hover:bg-brass-soft text-ink font-mono font-medium py-1.5 px-3 sm:py-2 sm:px-6 uppercase tracking-widest text-[10px] sm:text-sm transition-colors cursor-pointer flex items-center gap-1 sm:gap-2 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3 sm:size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.92-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
            </svg>
            Print Receipt
        </button>
    </div>

    <!-- Receipt Container -->
    <div class="receipt-container max-w-2xl mx-auto bg-white border border-ink/10 shadow-sm p-4 sm:p-8 md:p-12 relative overflow-hidden">
        <!-- Logo / Bank Header -->
        <div class="text-center border-b-2 border-dashed border-ink/20 pb-5 sm:pb-8 mb-5 sm:mb-8">
            <h1 class="font-display font-medium text-2xl sm:text-4xl tracking-tight text-ink mb-1">LedgerCore Bank</h1>
            <p class="font-mono text-[10px] sm:text-sm text-muted uppercase tracking-widest">Transaction Receipt</p>
        </div>

        <!-- Main Details -->
        <div class="space-y-4 sm:space-y-6">
            <div class="flex justify-between items-center pb-3 sm:pb-4 border-b border-ink/5">
                <span class="font-mono text-[10px] sm:text-xs uppercase tracking-widest text-muted">Statement ID</span>
                <span class="font-mono text-xs sm:text-sm font-medium text-ink">#{{ str_pad($entry->id, 8, '0', STR_PAD_LEFT) }}</span>
            </div>

            <div class="flex justify-between items-center pb-3 sm:pb-4 border-b border-ink/5">
                <span class="font-mono text-[10px] sm:text-xs uppercase tracking-widest text-muted">Transaction Type</span>
                <span class="font-mono text-xs sm:text-sm font-medium uppercase text-ink">{{ $entry->type }}</span>
            </div>

            <div class="flex justify-between items-center pb-3 sm:pb-4 border-b border-ink/5">
                <span class="font-mono text-[10px] sm:text-xs uppercase tracking-widest text-muted">Reference</span>
                <span class="font-mono text-[10px] sm:text-sm text-ink truncate ml-4 text-right">{{ $entry->reference }}</span>
            </div>

            <div class="flex justify-between items-center pb-3 sm:pb-4 border-b border-ink/5">
                <span class="font-mono text-[10px] sm:text-xs uppercase tracking-widest text-muted">Date & Time</span>
                <span class="font-mono text-xs sm:text-sm text-ink text-right ml-4">{{ $entry->created_at->format('F d, Y \a\t h:i A') }}</span>
            </div>

            <div class="flex justify-between items-center pb-3 sm:pb-4 border-b border-ink/5">
                <span class="font-mono text-[10px] sm:text-xs uppercase tracking-widest text-muted">
                    {{ $entry->direction === 'debit' ? 'From Account' : 'To Account' }}
                </span>
                <span class="font-mono text-xs sm:text-sm text-ink">{{ $entry->account->account_number }}</span>
            </div>

            @if($entry->type === 'transfer')
                @if($entry->direction === 'credit' && $entry->sender)
                <div class="flex justify-between items-center pb-3 sm:pb-4 border-b border-ink/5">
                    <span class="font-mono text-[10px] sm:text-xs uppercase tracking-widest text-muted">From Sender</span>
                    <span class="font-mono text-xs sm:text-sm text-ink text-right">
                        {{ optional($entry->sender->user)->name ?? 'Unknown' }}<br>
                        <span class="text-[10px] sm:text-xs text-muted">{{ $entry->sender->account_number }}</span>
                    </span>
                </div>
                @elseif($entry->direction === 'debit' && $entry->recipient)
                <div class="flex justify-between items-center pb-3 sm:pb-4 border-b border-ink/5">
                    <span class="font-mono text-[10px] sm:text-xs uppercase tracking-widest text-muted">To Recipient</span>
                    <span class="font-mono text-xs sm:text-sm text-ink text-right">
                        {{ optional($entry->recipient->user)->name ?? 'Unknown' }}<br>
                        <span class="text-[10px] sm:text-xs text-muted">{{ $entry->recipient->account_number }}</span>
                    </span>
                </div>
                @endif
            @endif
            
            <div class="flex justify-between items-center pb-3 sm:pb-4 border-b border-ink/5">
                <span class="font-mono text-[10px] sm:text-xs uppercase tracking-widest text-muted">Direction</span>
                <span class="font-mono text-xs sm:text-sm uppercase {{ $entry->direction === 'credit' ? 'text-ledger-green' : 'text-ledger-rust' }}">
                    {{ $entry->direction }}
                </span>
            </div>
        </div>

        <!-- Amount Section -->
        <div class="mt-5 pt-5 sm:mt-8 sm:pt-8 border-t-2 border-dashed border-ink/20 text-center">
            <div class="font-mono text-[9px] sm:text-xs uppercase tracking-widest text-muted mb-1 sm:mb-2">Transaction Amount</div>
            <div class="font-mono text-2xl sm:text-4xl font-medium {{ $entry->direction === 'credit' ? 'text-ledger-green' : 'text-ledger-rust' }}">
                {{ $entry->direction === 'credit' ? '+' : '-' }}₦{{ number_format($entry->amount, 2) }}
            </div>
        </div>

        <!-- AI Ledger Explainer (Manager Only) -->
        @if(auth()->check() && auth()->user()->role === 'manager')
        <div class="mt-6 pt-6 sm:mt-8 sm:pt-8 border-t-2 border-dashed border-ink/20 no-print" x-data="{
            explaining: false,
            explanation: null,
            explainEntry() {
                this.explaining = true;
                fetch('{{ route('manager.statements.explain', $entry->id, false) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.explanation = data.explanation;
                })
                .catch(err => {
                    console.error(err);
                    alert('Failed to get explanation');
                })
                .finally(() => {
                    this.explaining = false;
                });
            }
        }">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4 gap-4 sm:gap-0">
                <div>
                    <h3 class="font-display text-base sm:text-lg flex items-center gap-2">
                        <svg class="w-5 h-5 text-brass" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" stroke-width="1.5" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5"></path></svg>
                        AI Entry Explainer
                    </h3>
                    <p class="text-muted font-mono text-[10px] sm:text-[11px] uppercase tracking-widest mt-1">Translate ledger entry to plain english</p>
                </div>
                <button @click="explainEntry" x-show="!explanation" :disabled="explaining" class="border border-brass/30 bg-brass/10 hover:bg-brass/20 text-brass px-3 py-2 sm:px-4 sm:py-2 font-mono text-[10px] sm:text-xs uppercase tracking-widest transition-colors flex items-center justify-center gap-2 w-full sm:w-auto">
                    <span x-show="!explaining">Explain Entry</span>
                    <span x-show="explaining" style="display: none;">
                        <svg class="animate-spin h-3 w-3 text-brass" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        Analyzing...
                    </span>
                </button>
            </div>
            
            <div x-show="explanation" x-transition.opacity style="display: none;" class="p-4 sm:p-6 bg-paper border border-brass/20 shadow-sm relative group">
                <div class="absolute inset-0 bg-gradient-to-br from-brass/5 to-transparent pointer-events-none"></div>
                <p class="font-serif text-base sm:text-lg leading-relaxed text-ink relative z-10" x-text="explanation"></p>
            </div>
        </div>
        @endif

        <!-- Footer -->
        <div class="mt-8 sm:mt-12 text-center text-[10px] sm:text-xs font-mono text-muted uppercase tracking-[0.16em]">
            <p>Thank you for banking with LedgerCore.</p>
            <p class="mt-1 opacity-70">Generated on {{ now()->format('M d, Y H:i:s') }}</p>
        </div>
    </div>
@endsection
