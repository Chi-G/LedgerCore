{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Overview — LedgerCore')

@section('content')

    <div class="flex justify-between items-baseline mb-9">
        <div>
            <div class="text-[11px] tracking-[0.18em] uppercase text-ink/80 font-mono">
                Account {{ $account->account_number }}
            </div>
            <h1 class="font-display text-[28px] font-medium mt-1">Overview</h1>
        </div>
        <div class="font-mono text-[11px] text-ink/80 text-right hidden lg:block">
            As of {{ now()->format('d M Y · H:i') }}
        </div>
    </div>

    <div class="grid lg:grid-cols-[1.3fr_1fr] gap-6 mb-7">

        <x-balance-card :account="$account" :balance="$balance" />

        <div class="flex flex-col gap-4">
            <x-stat label="Credits — this month" :value="'+₦' . number_format($monthlyCredits, 2)" tone="credit" />
            <x-stat label="Debits — this month" :value="'−₦' . number_format($monthlyDebits, 2)" tone="debit" />
            <x-stat label="Pending transfers" :value="$pendingTransfersCount" />
        </div>

    </div>

    {{-- LEDGER TAPE --}}
    <div class="bg-white border border-[#E7E2D6] rounded-md overflow-hidden">
        <div class="flex justify-between items-center px-7 py-5 border-b border-[#E7E2D6]">
            <div>
                <div class="font-display text-lg">Ledger</div>
                <div class="text-[11.5px] text-[#8B8474] font-mono mt-0.5">
                    Double-entry record · most recent first
                </div>
            </div>
            <form method="GET" action="{{ route('dashboard', ['uuid' => auth()->user()->uuid]) }}">
                <select name="range" onchange="this.form.submit()"
                    class="text-[11.5px] font-mono border border-[#D8D2C2] rounded-full px-3.5 py-1.5 bg-transparent">
                    <option value="month" {{ request('range', 'month') === 'month' ? 'selected' : '' }}>This month</option>
                    <option value="week" {{ request('range') === 'week' ? 'selected' : '' }}>This week</option>
                    <option value="all" {{ request('range') === 'all' ? 'selected' : '' }}>All time</option>
                </select>
            </form>
        </div>

        @forelse ($entries as $entry)
            <x-ledger-row :entry="$entry" />
        @empty
            <div class="px-7 py-10 text-center text-[#9C9486] text-sm font-mono">
                No ledger entries for this period.
            </div>
        @endforelse

        <div class="px-7 py-4 flex justify-between items-center border-t border-[#E7E2D6]">
            <span class="text-[11px] text-[#9C9486] font-mono hidden lg:inline">
                Showing {{ $entries->count() }} of {{ $entries->total() ?? $entries->count() }} entries
            </span>
            <div class="flex-1 lg:flex-none">
                <a href="{{ route('statements.index', ['uuid' => auth()->user()->uuid, 'account' => $account->id]) }}"
                    class="bg-brass text-ink rounded text-[12.5px] font-semibold px-4.5 py-2.5 hover:bg-brass-soft transition-colors w-full lg:w-auto text-center block lg:inline-block">
                    View full statement
                </a>
            </div>
        </div>

        @if ($entries->hasPages())
            <div class="px-7 py-4 border-t border-[#E7E2D6] bg-[#FAFAFA]">
                {{ $entries->links() }}
            </div>
        @endif
    </div>

@endsection
