@extends('layouts.app')

@section('title', 'LedgerCore — Reports')

@section('content')
    <header class="flex justify-between items-end mb-8 border-b border-ink/10 pb-4">
        <div>
            <h1 class="font-display font-medium text-3xl tracking-tight">Management Reports</h1>
            <p class="text-muted mt-1 text-[13.5px]">Analytical views of ledger activity.</p>
        </div>
    </header>

    <div class="bg-white border border-ink/10 p-8 shadow-sm">
        <h2 class="font-display text-xl mb-2 text-ink">Dormant Customers (Current Month)</h2>
        <p class="text-muted text-sm mb-6">Customers with zero transaction activity in the current calendar month.</p>

        <!-- Filters -->
        <form action="{{ route(request()->route()->getName(), request()->route()->parameters()) }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 items-end mb-6 bg-paper/50 p-4 border border-ink/5">
            <div>
                <label for="name" class="block font-mono text-xs uppercase tracking-widest text-muted mb-2">Customer Name</label>
                <input type="text" name="name" id="name" value="{{ request('name') }}" class="w-full bg-white border border-ink/10 text-ink p-2 font-mono text-sm focus:outline-none focus:border-brass">
            </div>
            <div>
                <label for="email" class="block font-mono text-xs uppercase tracking-widest text-muted mb-2">Email</label>
                <input type="text" name="email" id="email" value="{{ request('email') }}" class="w-full bg-white border border-ink/10 text-ink p-2 font-mono text-sm focus:outline-none focus:border-brass">
            </div>
            <div>
                <label for="txn_count" class="block font-mono text-xs uppercase tracking-widest text-muted mb-2">Transactions</label>
                <input type="number" min="0" name="txn_count" id="txn_count" value="{{ request('txn_count') }}" class="w-full bg-white border border-ink/10 text-ink p-2 font-mono text-sm focus:outline-none focus:border-brass">
            </div>
            <div>
                <label for="status" class="block font-mono text-xs uppercase tracking-widest text-muted mb-2">Status</label>
                <select name="status" id="status" class="w-full bg-white border border-ink/10 text-ink p-2 font-mono text-sm focus:outline-none focus:border-brass">
                    <option value="">All Statuses</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="dormant" {{ request('status') == 'dormant' ? 'selected' : '' }}>Dormant</option>
                </select>
            </div>
            <div>
                <button type="submit" class="w-full bg-brass hover:bg-brass-soft text-ink font-mono font-medium py-2 px-4 uppercase tracking-widest text-sm transition-colors cursor-pointer">
                    Filter
                </button>
            </div>
        </form>

        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-ink/10">
                    <th class="py-3 px-4 font-mono text-[10px] text-muted uppercase tracking-[0.16em]">Customer Name</th>
                    <th class="py-3 px-4 font-mono text-[10px] text-muted uppercase tracking-[0.16em]">Email</th>
                    <th class="py-3 px-4 font-mono text-[10px] text-muted uppercase tracking-[0.16em] text-right">Transactions</th>
                    <th class="py-3 px-4 font-mono text-[10px] text-muted uppercase tracking-[0.16em] text-center">Status</th>
                </tr>
            </thead>
            <tbody class="font-mono text-sm">
                @forelse($dormantCustomers as $customer)
                    <tr class="border-b border-ink/5 hover:bg-paper/50 transition-colors">
                        <td class="py-4 px-4 text-ink">{{ $customer->name }}</td>
                        <td class="py-4 px-4 text-muted">{{ $customer->email }}</td>
                        <td class="py-4 px-4 text-right tabular-nums">{{ $customer->txn_count }}</td>
                        <td class="py-4 px-4 text-center">
                            @if($customer->txn_count == 0)
                                <span class="bg-ledger-rust/10 text-ledger-rust border border-ledger-rust/20 px-2 py-1 text-xs uppercase tracking-wider rounded-sm">Dormant</span>
                            @else
                                <span class="bg-ledger-green/10 text-ledger-green border border-ledger-green/20 px-2 py-1 text-xs uppercase tracking-wider rounded-sm">Active</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-12 text-center text-muted border-none">
                            No customers found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="mt-6">
            {{ $dormantCustomers->links() }}
        </div>
    </div>
@endsection
