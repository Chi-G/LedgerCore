@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto space-y-8">
        <header>
            <h1 class="text-2xl font-bold text-paper mb-2">Security & Sessions</h1>
            <p class="text-muted text-sm">Manage and revoke your active sessions across other browsers and devices.</p>
        </header>

        @if(session('success'))
            <div class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded text-sm font-mono">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-ledger-rust/10 border border-ledger-rust/20 text-ledger-rust p-4 rounded text-sm font-mono">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-panel rounded-lg border border-white/5 overflow-hidden">
            <div class="p-6">
                <h2 class="text-lg font-medium text-paper mb-4">Active Sessions</h2>
                
                <div class="space-y-4">
                    @foreach($sessions as $session)
                        <div class="flex items-start sm:items-center justify-between p-4 rounded bg-panel-2 border {{ $session->is_current_device ? 'border-brass/30' : 'border-transparent' }}">
                            <div class="flex items-start gap-4">
                                <div class="mt-1">
                                    <svg class="w-6 h-6 {{ $session->is_current_device ? 'text-brass' : 'text-muted' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-[13.5px] text-paper break-all sm:break-normal max-w-xs sm:max-w-md line-clamp-1" title="{{ $session->user_agent }}">
                                        {{ $session->user_agent ?? 'Unknown Device' }}
                                    </div>
                                    <div class="text-[12px] font-mono text-muted mt-1 space-x-2">
                                        <span>{{ $session->ip_address }}</span>
                                        <span>&middot;</span>
                                        @if($session->is_current_device)
                                            <span class="text-brass">This device</span>
                                        @else
                                            <span>Last active {{ $session->last_active }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @if(!$session->is_current_device)
                                <form action="{{ route('sessions.destroy', $session->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 rounded text-[12.5px] text-ledger-rust border border-ledger-rust/20 hover:bg-ledger-rust/10 transition-colors ml-4 whitespace-nowrap">
                                        Revoke
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
