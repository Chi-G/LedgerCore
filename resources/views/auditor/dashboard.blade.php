@extends('layouts.app')

@section('title', 'Auditor Dashboard - LedgerCore')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-9 gap-4">
        <div>
            <div class="text-[11px] tracking-[0.18em] uppercase text-ink/80 font-mono">
                Auditor Dashboard
            </div>
            <h1 class="font-display text-[28px] font-medium mt-1">System Audit Overview</h1>
        </div>
        <div class="font-mono text-[11px] text-ink/80 text-left md:text-right">
            As of {{ now()->format('d M Y · H:i') }}
        </div>
    </div>

    <!-- Metrics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-7">
        <!-- High Value Txns -->
        <div class="bg-ink text-paper rounded-md p-8 relative overflow-hidden">
            <div class="text-[11px] tracking-[0.16em] uppercase text-brass-soft font-mono">High Value Txns Today</div>
            <div class="font-display text-4xl font-light mt-3 tracking-tight">
                {{ number_format($highValueTransactions) }}
            </div>
        </div>

        <!-- Total Entries Today -->
        <div class="bg-white border border-ink/10 shadow-sm rounded-md p-8 relative">
            <div class="text-[11px] tracking-[0.16em] uppercase text-muted font-mono">Ledger Entries Today</div>
            <div class="font-display text-4xl font-light mt-3 tracking-tight text-ink">
                {{ number_format($totalEntriesToday) }}
            </div>
        </div>

        <!-- Total System Accounts -->
        <div class="bg-white border border-ink/10 shadow-sm rounded-md p-8 relative">
            <div class="text-[11px] tracking-[0.16em] uppercase text-muted font-mono">Total System Accounts</div>
            <div class="font-display text-4xl font-light mt-3 tracking-tight text-ink">
                {{ number_format($activeAccountsCount) }}
            </div>
        </div>
    </div>

    <div class="flex items-center justify-between mb-5">
        <h2 class="font-display text-xl font-medium">Recent Global Activity</h2>
    </div>

    <!-- Recent Transactions -->
    <div class="bg-white border border-ink/10 shadow-sm">
        @if ($recentTransactions->isEmpty())
            <div class="p-8 text-center text-muted text-[13px]">
                No recent activity on the network.
            </div>
        @else
            <!-- Header -->
            <div class="hidden lg:grid grid-cols-[1fr_2fr_1fr_1fr] gap-4 p-4 border-b border-ink/10 bg-paper/50 font-mono text-[10px] uppercase tracking-widest text-muted">
                <div>Date & Time</div>
                <div>Account & Details</div>
                <div class="text-right">Amount</div>
                <div class="text-right">Balance</div>
            </div>

            <div class="divide-y divide-ink/5">
                @foreach ($recentTransactions as $entry)
                    @php
                        $isCredit = $entry->direction === 'credit';
                        $iconClass = $isCredit
                            ? 'text-ledger-teal bg-ledger-teal/10 border-ledger-teal/20'
                            : 'text-ledger-rust bg-ledger-rust/10 border-ledger-rust/20';
                        $amountClass = $isCredit ? 'text-ledger-teal' : 'text-ledger-rust';
                    @endphp

                    <div class="grid grid-cols-1 lg:grid-cols-[1fr_2fr_1fr_1fr] gap-2 lg:gap-4 p-4 items-center hover:bg-paper/30 transition-colors">
                        <div class="font-mono text-[11px] text-muted whitespace-nowrap">
                            <div class="text-ink/80">{{ $entry->created_at->format('M d, Y') }}</div>
                            <div class="text-[10px]">{{ $entry->created_at->format('H:i') }}</div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full border flex items-center justify-center shrink-0 {{ $iconClass }}">
                                @if ($entry->type === 'deposit')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                    </svg>
                                @elseif($entry->type === 'withdrawal')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                    </svg>
                                @endif
                            </div>
                            <div>
                                <div class="text-[13.5px] font-medium">{{ ucfirst($entry->type) }}</div>
                                <div class="text-[11.5px] text-muted flex items-center gap-2 mt-0.5">
                                    <span class="font-mono">{{ $entry->reference }}</span>
                                    <span>&bull;</span>
                                    <span class="font-mono">{{ $entry->account->account_number ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="font-mono text-sm {{ $amountClass }} lg:text-right whitespace-nowrap mt-2 lg:mt-0">
                            {{ $isCredit ? '+' : '−' }}₦{{ number_format($entry->amount, 2) }}
                        </div>

                        <div class="font-mono text-[13px] text-muted lg:text-right hidden lg:block">
                            <span class="opacity-30">N/A</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        
        <div class="p-4 border-t border-ink/10 bg-white">
            {{ $recentTransactions->links() }}
        </div>
    </div>
@endsection
