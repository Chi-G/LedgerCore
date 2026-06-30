@extends('layouts.app')

@section('title', 'LedgerCore — Transfers')

@section('content')
    <header class="flex justify-between items-end mb-8 border-b border-ink/10 pb-4">
        <div>
            <h1 class="font-display font-medium text-3xl tracking-tight">
                @if(isset($isTeller) && $isTeller)
                    <span x-text="transactionType === 'deposit' ? 'Process Deposit' : (transactionType === 'withdrawal' ? 'Process Withdrawal' : 'Execute Transfer')">Process Transaction</span>
                @else
                    Execute Transfer
                @endif
            </h1>
            <p class="text-muted mt-1 text-[13.5px]">
                @if(isset($isTeller) && $isTeller)
                    <span x-text="transactionType === 'deposit' ? 'Credit funds directly into a customer account.' : (transactionType === 'withdrawal' ? 'Debit funds from a customer account with authorization.' : 'Move funds securely between ledger accounts.')">Process customer transaction.</span>
                @else
                    Move funds securely between ledger accounts.
                @endif
            </p>
        </div>
    </header>

    <div class="w-full bg-white border border-ink/10 p-8 shadow-sm">
        @if (session('success'))
            <div
                class="mb-8 p-4 border border-ledger-green/50 bg-ledger-green/10 text-ledger-green font-mono text-sm rounded-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div
                class="mb-8 p-4 border border-ledger-rust/50 bg-ledger-rust/10 text-ledger-rust font-mono text-sm rounded-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($isTeller) && $isTeller ? route('teller.transfers.store') : route('transfers.store', ['uuid' => request()->route('uuid') ?? auth()->user()->uuid]) }}" method="POST" class="space-y-8" x-data="{ submitting: false, transactionType: '{{ old('transaction_type', 'deposit') }}' }"
            @submit="submitting = true">
            @csrf

            @if(isset($isTeller) && $isTeller)
                <div class="mb-8">
                    <label class="block font-mono text-xs uppercase tracking-widest text-ink/80 mb-3">Transaction Type</label>
                    <div class="grid grid-cols-3 gap-4">
                        <label class="relative cursor-pointer">
                            <input type="radio" name="transaction_type" value="deposit" x-model="transactionType" class="peer sr-only">
                            <div class="border border-ink/10 py-3 text-center peer-checked:bg-brass peer-checked:border-brass peer-checked:text-ink font-mono text-sm transition-colors text-ink/60">Deposit</div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="transaction_type" value="withdrawal" x-model="transactionType" class="peer sr-only">
                            <div class="border border-ink/10 py-3 text-center peer-checked:bg-brass peer-checked:border-brass peer-checked:text-ink font-mono text-sm transition-colors text-ink/60">Withdrawal</div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="transaction_type" value="transfer" x-model="transactionType" class="peer sr-only">
                            <div class="border border-ink/10 py-3 text-center peer-checked:bg-brass peer-checked:border-brass peer-checked:text-ink font-mono text-sm transition-colors text-ink/60">Transfer</div>
                        </label>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Source Account -->
                @if(isset($isTeller) && $isTeller)
                    <div x-show="transactionType !== 'deposit'" style="display: none;">
                        <label for="source_account"
                            class="block font-mono text-xs uppercase tracking-widest text-ink/80 mb-2">Source Account
                            (Manual)</label>
                        <input id="source_account" type="text" name="source_account"
                            value="{{ old('source_account') }}" x-bind:required="transactionType !== 'deposit'" x-bind:disabled="transactionType === 'deposit'"
                            class="w-full bg-paper border border-ink/10 text-ink py-2.5 px-3 focus:outline-none focus:border-brass focus:ring-1 focus:ring-brass transition-colors font-mono text-sm placeholder:text-[9.5px] md:placeholder:text-sm"
                            placeholder="Enter Source Account - 0098765432">
                    </div>
                @else
                    <div>
                        <label for="source_account"
                            class="block font-mono text-xs uppercase tracking-widest text-ink/80 mb-2">Source Account</label>
                        <select id="source_account" name="source_account" required
                            class="w-full bg-paper border border-ink/10 text-ink py-2.5 px-3 focus:outline-none focus:border-brass focus:ring-1 focus:ring-brass transition-colors font-mono text-sm placeholder:text-[9.5px] md:placeholder:text-sm">
                            <option value="">Select Account...</option>
                            @foreach ($accounts as $account)
                                <option value="{{ $account->account_number }}"
                                    {{ old('source_account', $accounts->count() === 1 ? $accounts->first()->account_number : '') == $account->account_number ? 'selected' : '' }}>
                                    {{ $account->account_number }} (₦{{ number_format($account->balance(), 2) }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <!-- Destination Account -->
                <div class="{{ isset($isTeller) && $isTeller ? '' : '' }}" x-show="!$data.transactionType || transactionType !== 'withdrawal'">
                    <label for="destination_account"
                        class="block font-mono text-xs uppercase tracking-widest text-ink/80 mb-2">Destination Account
                        (Manual)</label>
                    <input id="destination_account" type="text" name="destination_account"
                        value="{{ old('destination_account') }}" x-bind:required="!$data.transactionType || transactionType !== 'withdrawal'" x-bind:disabled="$data.transactionType && transactionType === 'withdrawal'"
                        class="w-full bg-paper border border-ink/10 text-ink py-2.5 px-3 focus:outline-none focus:border-brass focus:ring-1 focus:ring-brass transition-colors font-mono text-sm placeholder:text-[9.5px] md:placeholder:text-sm"
                        placeholder="Enter Destination Account - 0098765432">
                </div>
            </div>

            <!-- Amount, Reference & PIN -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <label for="amount" class="block font-mono text-xs uppercase tracking-widest text-ink/80 mb-2">Amount
                        (₦)</label>
                    <input id="amount" type="number" step="0.01" min="1" name="amount"
                        value="{{ old('amount') }}" required
                        class="w-full bg-paper border border-ink/10 text-ink py-2.5 px-3 focus:outline-none focus:border-brass focus:ring-1 focus:ring-brass transition-colors font-mono text-sm placeholder:text-[9.5px] md:placeholder:text-sm"
                        placeholder="0.00">
                </div>

                <div>
                    <label for="reference"
                        class="block font-mono text-xs uppercase tracking-widest text-ink/80 mb-2">Reference
                        (Optional)</label>
                    <input id="reference" type="text" name="reference" value="{{ old('reference') }}"
                        class="w-full bg-paper border border-ink/10 text-ink py-2.5 px-3 focus:outline-none focus:border-brass focus:ring-1 focus:ring-brass transition-colors font-mono text-sm placeholder:text-[9.5px] md:placeholder:text-sm"
                        placeholder="e.g. TRF-INV-001">
                </div>
                
                @if(isset($isTeller) && $isTeller)
                <div x-show="transactionType !== 'deposit'" style="display: none;">
                    <label for="pin"
                        class="block font-mono text-xs uppercase tracking-widest text-ledger-rust mb-2 font-semibold">Customer PIN (Required)</label>
                    <input id="pin" type="password" name="pin" x-bind:required="transactionType !== 'deposit'" x-bind:disabled="transactionType === 'deposit'"
                        class="w-full bg-paper border border-ledger-rust/30 text-ink py-2.5 px-3 focus:outline-none focus:border-ledger-rust focus:ring-1 focus:ring-ledger-rust transition-colors font-mono text-sm placeholder:text-ledger-rust/40"
                        placeholder="****">
                </div>
                @endif
            </div>

            <div class="pt-6 border-t border-ink/10 flex justify-end">
                <button type="submit" :disabled="submitting" :class="submitting ? 'opacity-80 cursor-not-allowed' : ''"
                    class="bg-brass hover:bg-brass-soft text-ink font-mono font-medium py-3 px-8 uppercase tracking-widest text-sm transition-colors flex items-center justify-center gap-2 min-w-[240px]">

                    @if(isset($isTeller) && $isTeller)
                        <span x-show="!submitting" x-text="transactionType === 'deposit' ? 'Process Deposit' : (transactionType === 'withdrawal' ? 'Process Withdrawal' : 'Execute Transfer')">Process Transaction</span>
                    @else
                        <span x-show="!submitting">Authorize Transfer</span>
                    @endif

                    <span x-show="submitting" class="flex items-center gap-2" style="display: none;">
                        <svg class="animate-spin h-4 w-4 text-ink" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Processing...
                    </span>
                </button>
            </div>
        </form>
    </div>
@endsection
