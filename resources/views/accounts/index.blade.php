@extends('layouts.app')

@section('title', 'LedgerCore — Accounts')

@section('content')
    <header class="flex justify-between items-end mb-8 border-b border-ink/10 pb-4">
        <div>
            <h1 class="font-display font-medium text-3xl tracking-tight">Accounts Directory</h1>
            <p class="text-muted mt-1 text-[13.5px]">Manage and review registered ledger accounts.</p>
        </div>
    </header>

    @if(in_array(auth()->user()->role, ['teller', 'auditor', 'manager']))
    <!-- Filters -->
    <div class="bg-white border border-ink/10 p-6 mb-8 shadow-sm">
        <form action="{{ route(request()->route()->getName(), request()->route()->parameters()) }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 items-end">
            <div>
                <label for="account_number" class="block font-mono text-xs uppercase tracking-widest text-muted mb-2">Account Number</label>
                <input type="text" name="account_number" id="account_number" value="{{ request('account_number') }}" class="w-full bg-paper border border-ink/10 text-ink p-2 font-mono text-sm focus:outline-none focus:border-brass" placeholder="Enter Account #">
            </div>
            <div>
                <label for="account_name" class="block font-mono text-xs uppercase tracking-widest text-muted mb-2">Account Name</label>
                <input type="text" name="account_name" id="account_name" value="{{ request('account_name') }}" class="w-full bg-paper border border-ink/10 text-ink p-2 font-mono text-sm focus:outline-none focus:border-brass" placeholder="Search by name">
            </div>
            <div>
                <button type="submit" class="w-full bg-brass hover:bg-brass-soft text-ink font-mono font-medium py-2 px-4 uppercase tracking-widest text-sm transition-colors cursor-pointer">
                    Search Directory
                </button>
            </div>
        </form>
    </div>
    @endif

    <div class="flex flex-col gap-6">
        @foreach($accounts as $account)
            <div class="relative bg-white border border-ink/10 p-7 shadow-sm flex flex-col justify-between group hover:shadow-md hover:border-brass/30 transition-all duration-300 overflow-hidden">
                <!-- Decorative accents -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-brass/5 to-transparent rounded-bl-full opacity-50 group-hover:scale-110 transition-transform duration-500 pointer-events-none"></div>
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brass to-brass-soft opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                <div class="flex justify-between items-start mb-8 relative z-10">
                    <div>
                        <div class="text-[10px] text-ink/80 font-mono uppercase tracking-[0.2em] mb-1.5 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-ledger-green shadow-[0_0_8px_rgba(47,93,69,0.4)]"></span>
                            {{ ucfirst($account->type) }} Account
                        </div>
                        <div class="font-mono font-medium text-xl text-ink tracking-tight">
                            {{ implode(' ', str_split($account->account_number, 4)) }}
                        </div>
                    </div>
                    @if(in_array(auth()->user()->role, ['teller', 'auditor', 'manager']) && $account->user)
                        <div class="text-[10px] text-ink/70 font-semibold uppercase tracking-wider bg-paper px-2.5 py-1.5 border border-ink/10 rounded">
                            {{ $account->user->name }}
                        </div>
                    @endif
                </div>
                
                <div class="mt-2 relative z-10">
                    <div class="text-[11px] text-ink/80 uppercase tracking-widest mb-1 font-mono">Available Balance</div>
                    <div class="font-display text-3xl text-ink">
                        <span class="text-brass/80 text-xl align-top mr-1">₦</span>{{ number_format($account->balance(), 2) }}
                    </div>
                </div>
                
                <div class="mt-8 pt-5 border-t border-ink/5 flex justify-between items-center relative z-10">
                    <div class="text-[10px] text-ink/80 font-mono uppercase tracking-widest">
                        Status: <span class="text-ledger-green">Active</span>
                    </div>
                    @if(auth()->user()->role !== 'teller')
                        @php
                            $role = auth()->user()->role;
                            $statementRoute = in_array($role, ['auditor', 'manager']) ? $role . '.statements.index' : 'statements.index';
                            $statementParams = ['account_number' => $account->account_number];
                            if ($role === 'customer' || !$role) {
                                $statementParams['uuid'] = request()->route('uuid') ?? auth()->user()->uuid;
                            }
                        @endphp
                        <a href="{{ route($statementRoute, $statementParams) }}" class="text-[11px] font-mono uppercase tracking-widest text-ink hover:text-brass transition-colors flex items-center gap-1 group-hover:gap-2">
                            View Ledger <span>&rarr;</span>
                        </a>
                    @endif
                </div>
            </div>
        @endforeach

        @if($accounts->isEmpty())
            <div class="col-span-full py-16 text-center border border-dashed border-ink/20 bg-white/50">
                <div class="w-12 h-12 rounded-full bg-paper border border-ink/10 flex items-center justify-center mx-auto mb-4 text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                </div>
                <p class="text-ink font-medium">No accounts found</p>
                <p class="text-muted text-sm mt-1">There are no ledger accounts registered in your directory.</p>
            </div>
        @endif
        
        @if(method_exists($accounts, 'links'))
            <div class="mt-2">
                {{ $accounts->links() }}
            </div>
        @endif
    </div>
@endsection
