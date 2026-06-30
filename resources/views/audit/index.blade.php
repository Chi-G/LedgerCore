@extends('layouts.app')

@section('title', 'LedgerCore — Audit Trail')

@section('content')
    <header class="flex justify-between items-end mb-8 border-b border-ink/10 pb-4">
        <div>
            <h1 class="font-display font-medium text-3xl tracking-tight text-ledger-rust">Global Audit Trail</h1>
            <p class="text-muted mt-1 text-[13.5px]">Restricted view of all bank-wide ledger entries.</p>
        </div>
    </header>

    <!-- Filters -->
    <div class="bg-white border border-ink/10 p-6 mb-8 shadow-sm">
        <form action="{{ route(request()->route()->getName(), request()->route()->parameters()) }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 items-end">
            <div>
                <label for="reference" class="block font-mono text-xs uppercase tracking-widest text-muted mb-2">Reference ID</label>
                <input type="text" name="reference" id="reference" value="{{ request('reference') }}" class="w-full bg-paper border border-ink/10 text-ink p-2 font-mono text-sm focus:outline-none focus:border-brass">
            </div>
            <div>
                <label for="account_number" class="block font-mono text-xs uppercase tracking-widest text-muted mb-2">Account No.</label>
                <input type="text" name="account_number" id="account_number" value="{{ request('account_number') }}" class="w-full bg-paper border border-ink/10 text-ink p-2 font-mono text-sm focus:outline-none focus:border-brass">
            </div>
            <div>
                <label for="account_name" class="block font-mono text-xs uppercase tracking-widest text-muted mb-2">Account Name</label>
                <input type="text" name="account_name" id="account_name" value="{{ request('account_name') }}" class="w-full bg-paper border border-ink/10 text-ink p-2 font-mono text-sm focus:outline-none focus:border-brass">
            </div>
            <div>
                <label for="date" class="block font-mono text-xs uppercase tracking-widest text-muted mb-2">Date</label>
                <input type="date" name="date" id="date" value="{{ request('date') }}" class="w-full bg-paper border border-ink/10 text-ink p-2 font-mono text-sm focus:outline-none focus:border-brass">
            </div>
            <div>
                <label for="amount" class="block font-mono text-xs uppercase tracking-widest text-muted mb-2">Amount</label>
                <input type="number" step="0.01" name="amount" id="amount" value="{{ request('amount') }}" class="w-full bg-paper border border-ink/10 text-ink p-2 font-mono text-sm focus:outline-none focus:border-brass">
            </div>
            <div>
                <label for="type" class="block font-mono text-xs uppercase tracking-widest text-muted mb-2">Txn Type</label>
                <select name="type" id="type" class="w-full bg-paper border border-ink/10 text-ink p-2 font-mono text-sm focus:outline-none focus:border-brass">
                    <option value="">All Types</option>
                    <option value="transfer" {{ request('type') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                    <option value="deposit" {{ request('type') == 'deposit' ? 'selected' : '' }}>Deposit</option>
                    <option value="withdrawal" {{ request('type') == 'withdrawal' ? 'selected' : '' }}>Withdrawal</option>
                </select>
            </div>
            <div>
                <button type="submit" class="w-full bg-brass hover:bg-brass-soft text-ink font-mono font-medium py-2 px-4 uppercase tracking-widest text-sm transition-colors cursor-pointer">
                    Search
                </button>
            </div>
        </form>
    </div>

    <!-- Ledger Tape -->
    <div class="bg-white border-l-2 border-l-ledger-rust border-y border-r border-ink/10 relative shadow-sm">
        <div class="absolute left-0 top-0 bottom-0 w-[4px] border-r border-dashed border-ink/10"></div>

        <div class="overflow-x-auto pl-4">
            <table class="w-full text-left border-collapse min-w-[800px]">
                <thead>
                    <tr class="border-b border-ink/10">
                        <th class="py-4 px-6 font-mono text-[10px] text-muted uppercase tracking-[0.16em] w-32">Timestamp</th>
                        <th class="py-4 px-6 font-mono text-[10px] text-muted uppercase tracking-[0.16em]">Account</th>
                        <th class="py-4 px-6 font-mono text-[10px] text-muted uppercase tracking-[0.16em]">Ref</th>
                        <th class="py-4 px-6 font-mono text-[10px] text-muted uppercase tracking-[0.16em]">Type</th>
                        <th class="py-4 px-6 font-mono text-[10px] text-muted uppercase tracking-[0.16em] text-right">Debit</th>
                        <th class="py-4 px-6 font-mono text-[10px] text-muted uppercase tracking-[0.16em] text-right">Credit</th>
                    </tr>
                </thead>
                <tbody class="font-mono text-[13.5px]">
                    @forelse($entries as $entry)
                        <tr class="border-b border-ink/5 hover:bg-paper/50 transition-colors">
                            <td class="py-4 px-6 text-muted">{{ $entry->created_at->format('M d, y H:i:s') }}</td>
                            <td class="py-4 px-6">
                                <div class="text-ink">{{ $entry->account->account_number }}</div>
                                <div class="text-[10px] text-muted uppercase">{{ $entry->account->user->name ?? 'Unknown' }}</div>
                            </td>
                            <td class="py-4 px-6 text-ink/80">{{ $entry->reference }}</td>
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
                            <td colspan="6" class="py-12 text-center text-muted border-none">
                                No ledger entries found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $entries->links() }}
    </div>
@endsection
