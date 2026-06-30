@extends('layouts.app')

@section('title', 'LedgerCore — Customer Statements')

@section('content')
    <header class="flex flex-col md:flex-row justify-between items-start md:items-end mb-8 border-b border-ink/10 pb-4 gap-4">
        <div>
            <h1 class="font-display font-medium text-3xl tracking-tight">Customer Statement</h1>
            <p class="text-muted mt-1 text-[13.5px]">Ledger tape for customer transaction history lookup.</p>
        </div>

        @if($selectedAccount)
        <div class="text-right">
            <div class="text-[10px] text-muted uppercase tracking-[0.16em] mb-1">Closing Balance</div>
            <div class="font-mono text-xl text-ink font-medium">₦{{ number_format($selectedAccount->balance(), 2) }}</div>
        </div>
        @endif
    </header>

    <!-- Filters -->
    <div class="bg-white border border-ink/10 p-6 mb-8 shadow-sm">
        <form action="{{ route(request()->route()->getName(), request()->route()->parameters()) }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
            <div>
                <label for="account_number" class="block font-mono text-xs uppercase tracking-widest text-muted mb-2">Account Number</label>
                <input type="text" name="account_number" id="account_number" value="{{ request('account_number') }}" class="w-full bg-paper border border-ink/10 text-ink p-2 font-mono text-sm focus:outline-none focus:border-brass" placeholder="Enter Account #">
            </div>
            <div>
                <label for="from" class="block font-mono text-xs uppercase tracking-widest text-muted mb-2">From Date</label>
                <input type="date" name="from" id="from" value="{{ request('from') }}" class="w-full bg-paper border border-ink/10 text-ink p-2 font-mono text-sm focus:outline-none focus:border-brass">
            </div>
            <div>
                <label for="to" class="block font-mono text-xs uppercase tracking-widest text-muted mb-2">To Date</label>
                <input type="date" name="to" id="to" value="{{ request('to') }}" class="w-full bg-paper border border-ink/10 text-ink p-2 font-mono text-sm focus:outline-none focus:border-brass">
            </div>
            <div class="flex gap-3">
                <a href="{{ route(request()->route()->getName(), request()->route()->parameters()) }}" class="w-1/3 flex items-center justify-center bg-white border border-ink/20 hover:border-ink/40 text-ink font-mono font-medium py-2 px-2 uppercase tracking-widest text-sm transition-colors" title="Clear Filters">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </a>
                <button type="submit" class="w-2/3 bg-brass hover:bg-brass-soft text-ink font-mono font-medium py-2 px-4 uppercase tracking-widest text-sm transition-colors cursor-pointer">
                    Lookup
                </button>
            </div>
        </form>
    </div>

    <!-- Ledger Tape -->
    @if ($selectedAccount || $accountQuery)
    <div class="bg-white border-l-2 border-l-ink border-y border-r border-ink/10 relative shadow-sm">
        <!-- Tape Perforation Detail -->
        <div class="absolute left-0 top-0 bottom-0 w-[4px] border-r border-dashed border-ink/10"></div>

        <div class="overflow-x-auto pl-4">
            <table class="w-full text-left border-collapse min-w-[600px]">
                <thead>
                    <tr class="border-b border-ink/10">
                        <th class="py-4 px-6 font-mono text-[10px] text-muted uppercase tracking-[0.16em] w-32">Timestamp</th>
                        <th class="py-4 px-6 font-mono text-[10px] text-muted uppercase tracking-[0.16em]">Details</th>
                        <th class="py-4 px-6 font-mono text-[10px] text-muted uppercase tracking-[0.16em]">Type</th>
                        <th class="py-4 px-6 font-mono text-[10px] text-muted uppercase tracking-[0.16em] text-right">Debit</th>
                        <th class="py-4 px-6 font-mono text-[10px] text-muted uppercase tracking-[0.16em] text-right">Credit</th>
                    </tr>
                </thead>
                <tbody class="font-mono text-[13.5px]">
                    @forelse($entries as $entry)
                        <tr onclick="window.location='{{ route(str_replace('.index', '.show', request()->route()->getName()), $entry->id) }}'" class="border-b border-ink/5 hover:bg-paper/50 transition-colors cursor-pointer">
                            <td class="py-4 px-6 text-muted">{{ $entry->created_at->format('M d, y H:i') }}</td>
                            <td class="py-4 px-6 text-ink/80">
                                <div class="mb-1">{{ $entry->reference }}</div>
                                @if($entry->type === 'transfer')
                                    <div class="text-[11px] text-muted">
                                        @if($entry->direction === 'credit')
                                            From: {{ optional(optional($entry->sender)->user)->name ?? 'Unknown' }} ({{ optional($entry->sender)->account_number ?? 'N/A' }})
                                        @else
                                            To: {{ optional(optional($entry->recipient)->user)->name ?? 'Unknown' }} ({{ optional($entry->recipient)->account_number ?? 'N/A' }})
                                        @endif
                                    </div>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-ink/80 uppercase text-xs">{{ $entry->type }}</td>
                            
                            @if($entry->direction === 'debit')
                                <td class="py-4 px-6 text-right text-ledger-rust tabular-nums">
                                    <div class="flex justify-end items-center gap-2">
                                        {{ number_format($entry->amount, 2) }}
                                        <span class="w-1.5 h-1.5 rounded-full bg-ledger-rust shrink-0"></span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-right text-muted tabular-nums">—</td>
                            @else
                                <td class="py-4 px-6 text-right text-muted tabular-nums">—</td>
                                <td class="py-4 px-6 text-right text-ledger-green tabular-nums">
                                    <div class="flex justify-end items-center gap-2">
                                        {{ number_format($entry->amount, 2) }}
                                        <span class="w-1.5 h-1.5 rounded-full bg-ledger-green shrink-0"></span>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-muted border-none">
                                {{ $selectedAccount ? 'No ledger entries found for this period.' : 'Account not found.' }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if ($entries->hasPages())
            <div class="px-7 py-4 border-t border-ink/10 bg-[#FAFAFA]">
                {{ $entries->links() }}
            </div>
        @endif
    </div>
    @else
        <div class="px-7 py-10 text-center text-[#9C9486] text-sm font-mono border border-ink/10 bg-white">
            Please enter an account number to lookup statements.
        </div>
    @endif
@endsection
