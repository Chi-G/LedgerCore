{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'LedgerCore')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300;9..144,500;9..144,600&family=IBM+Plex+Mono:wght@400;500;600&family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-paper text-ink font-sans antialiased" x-data="{ showLogoutModal: false }">

<div class="flex h-screen overflow-hidden" x-data="{ sidebarOpen: window.innerWidth >= 768 }" @resize.window="if(window.innerWidth < 768) sidebarOpen = false; else sidebarOpen = true;">

    {{-- SIDEBAR BACKDROP --}}
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-20 bg-ink/80 backdrop-blur-sm md:hidden"
         @click="sidebarOpen = false" 
         style="display: none;"></div>

    {{-- SIDEBAR --}}
    <aside :class="sidebarOpen ? 'translate-x-0 md:ml-0' : '-translate-x-full md:-ml-[260px]'" class="fixed md:relative inset-y-0 left-0 z-30 w-[260px] transform bg-ink text-paper p-6 md:p-8 flex flex-col items-stretch gap-6 md:gap-10 transition-all duration-300 ease-in-out overflow-y-auto border-r border-white/10 shrink-0 shadow-2xl md:shadow-none">
        <div class="flex items-center gap-2.5">
            <div class="w-[34px] h-[34px] border border-brass rounded text-brass-soft font-display flex items-center justify-center text-lg">L</div>
            <div>
                <div class="font-display text-lg tracking-wide">LedgerCore</div>
                <div class="text-[10px] text-muted uppercase tracking-[0.16em]">Core Banking</div>
            </div>
            <button @click="sidebarOpen = false" class="md:hidden ml-auto text-muted hover:text-paper focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <nav class="flex flex-col gap-1">
            @php
                $role = auth()->user()->role ?? 'customer';
                $prefix = match($role) {
                    'teller' => 'teller.',
                    'auditor' => 'auditor.',
                    'manager' => 'manager.',
                    default => ''
                };

                $links = [
                    ['label' => 'Overview', 'route' => $prefix . 'dashboard'],
                    ['label' => 'Accounts', 'route' => $prefix . 'accounts.index'],
                ];
                
                if (in_array($role, ['customer', 'teller'])) {
                    $links[] = ['label' => 'Transfers', 'route' => $prefix . 'transfers.index'];
                }
                
                if ($role !== 'teller') {
                    $route = in_array($role, ['auditor', 'manager']) ? $prefix . 'statements.index' : 'statements.index';
                    $links[] = ['label' => 'Statements', 'route' => $route];
                }
                
                if (in_array($role, ['auditor', 'manager'])) {
                    $links[] = ['label' => 'Reports', 'route' => $prefix . 'reports.index'];
                }
                
                if ($role === 'auditor') {
                    $links[] = ['label' => 'Audit Trail', 'route' => $prefix . 'audit.index'];
                }
            @endphp

            @foreach ($links as $link)
                @php
                    $isActive = request()->routeIs($link['route']);
                    $routeParams = ($role === 'customer') ? ['uuid' => auth()->user()->uuid] : [];
                @endphp
                <a href="{{ route($link['route'], $routeParams) }}"
                   class="flex items-center gap-2.5 px-3 py-2.5 rounded text-[13.5px] border-l-2 transition-colors
                          {{ $isActive
                                ? 'text-paper bg-panel border-brass'
                                : 'text-muted border-transparent hover:text-paper/80 hover:bg-white/5' }}">
                    <span class="w-1.5 h-1.5 rounded-full {{ $isActive ? 'bg-brass' : 'bg-muted' }}"></span>
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="flex flex-col mt-auto pt-4 border-t border-white/10 gap-4">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-full bg-panel-2 flex items-center justify-center font-mono text-xs text-brass-soft">
                    {{ strtoupper(substr(auth()->user()->name ?? 'CO', 0, 2)) }}
                </div>
                <div>
                    <div class="text-[12.5px] text-paper">{{ auth()->user()->name ?? 'Chijindu O.' }}</div>
                    <div class="text-[10.5px] text-muted uppercase tracking-[0.08em]">
                        {{ ucfirst(auth()->user()->role ?? 'customer') }} · Verified
                    </div>
                </div>
            </div>
            
            <a href="{{ route('sessions.index') }}" class="flex items-center gap-2 px-3 py-2 rounded text-[12.5px] text-muted border border-transparent hover:bg-white/5 hover:text-paper transition-colors w-full justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                Security & Sessions
            </a>

            <button @click="showLogoutModal = true" class="flex items-center gap-2 px-3 py-2 rounded text-[12.5px] text-ledger-rust border border-ledger-rust/20 hover:bg-ledger-rust/10 transition-colors w-full justify-center group">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:-translate-x-0.5 transition-transform"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                Secure Logout
            </button>
        </div>
    </aside>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col min-w-0 h-screen overflow-hidden">
        {{-- HEADER --}}
        <header class="flex items-center py-4 px-6 md:px-14 bg-paper border-b border-ink/5 gap-4">
            <button @click="sidebarOpen = !sidebarOpen" class="text-ink/60 hover:text-ink focus:outline-none p-2 rounded bg-white border border-ink/10 shadow-sm transition-colors shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="md:hidden flex items-center gap-2.5">
                <div class="w-[30px] h-[30px] border border-brass rounded text-brass-soft font-display flex items-center justify-center text-sm bg-ink">L</div>
                <div class="font-display tracking-wide text-ink">LedgerCore</div>
            </div>
        </header>

        {{-- MAIN SCROLLABLE CONTENT --}}
        <main class="flex-1 overflow-y-auto px-6 md:px-14 py-8 md:py-10 bg-paper">
            @yield('content')
        </main>
    </div>

</div>

{{-- LOGOUT MODAL --}}
<div x-show="showLogoutModal" style="display: none;" class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <!-- Backdrop -->
    <div x-show="showLogoutModal" 
         x-transition:enter="ease-out duration-300" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="ease-in duration-200" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0" 
         class="fixed inset-0 bg-ink/80 transition-opacity backdrop-blur-sm" 
         aria-hidden="true"></div>

    <!-- Modal Panel -->
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            
            <div x-show="showLogoutModal" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 class="relative transform overflow-hidden bg-paper border border-ink/10 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md"
                 @click.outside="showLogoutModal = false"
                 x-data="{ loggingOut: false }">
                 
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-ledger-rust/10 border border-ledger-rust/20 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-ledger-rust" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-base font-semibold leading-6 font-display text-ink" id="modal-title">
                                Confirm Secure Logout
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-ink/80">
                                    Are you sure you want to end your session? You will need to re-authenticate to access the ledger again.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white px-4 py-3 border-t border-ink/5 sm:flex sm:flex-row-reverse sm:px-6">
                    <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto sm:ml-3" 
                          @submit="loggingOut = true">
                        @csrf
                        <button type="submit" class="inline-flex w-full justify-center rounded border border-transparent bg-ledger-rust px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-ledger-rust/90 focus:outline-none focus:ring-2 focus:ring-ledger-rust focus:ring-offset-2 sm:w-auto transition-colors font-sans relative">
                            <span x-show="!loggingOut">End Session</span>
                            <span x-show="loggingOut" class="flex items-center gap-2" style="display: none;">
                                <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Logging out...
                            </span>
                        </button>
                    </form>
                    <button type="button" class="mt-3 inline-flex w-full justify-center rounded border border-ink/20 bg-white px-4 py-2 text-sm font-medium text-ink shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-ink/50 focus:ring-offset-2 sm:mt-0 sm:w-auto transition-colors font-sans" @click="showLogoutModal = false" :disabled="loggingOut">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@stack('scripts')
</body>
</html>
