{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LedgerCore — Secure Access</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300;9..144,500;9..144,600&family=IBM+Plex+Mono:wght@400;500;600&family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-ink text-paper font-sans antialiased">

<div class="grid grid-cols-1 md:grid-cols-[1fr_460px] min-h-screen">

    {{-- LEFT — atmosphere panel --}}
    <div class="hidden md:flex relative flex-col justify-between p-16 border-r border-white/[0.09] overflow-hidden">
        <div class="absolute inset-0 pointer-events-none"
             style="background:
                repeating-linear-gradient(125deg, transparent 0 46px, rgba(184,146,74,0.05) 46px 47px),
                radial-gradient(circle at 18% 12%, rgba(184,146,74,0.10), transparent 45%);">
        </div>

        <div class="flex items-center gap-3 relative z-10">
            <div class="w-[38px] h-[38px] border border-brass rounded text-brass-soft font-display text-xl flex items-center justify-center">L</div>
            <div>
                <div class="font-display text-[19px]">LedgerCore</div>
                <div class="text-[10px] text-muted uppercase tracking-[0.18em] mt-0.5">Core Banking</div>
            </div>
        </div>

        <div class="relative z-10 max-w-[430px]">
            <div class="font-display text-brass text-[46px] leading-none mb-1">&ldquo;</div>
            <div class="font-display text-[25px] font-light leading-snug text-paper">
                Every credit has a debit. Every entry, a record. Nothing moves that isn&rsquo;t accounted for twice.
            </div>
            <div class="font-mono text-[11.5px] text-muted mt-4.5 tracking-wide">
                — DOUBLE-ENTRY PRINCIPLE, LEDGER STANDARD §1.2
            </div>
        </div>

        <div class="relative z-10 flex flex-col gap-2.5">
            @php
                $systemChecks = [
                    ['label' => 'Session integrity check', 'value' => 'PASSED', 'tone' => 'g'],
                    ['label' => 'TLS 1.3 channel', 'value' => 'SECURE', 'tone' => 'g'],
                    ['label' => 'Unverified device flag', 'value' => 'CLEAR', 'tone' => 'r'],
                ];
            @endphp
            @foreach ($systemChecks as $i => $check)
                <div class="grid grid-cols-[14px_1fr_90px] items-center gap-3 font-mono text-[11px] text-muted pb-2.5 {{ $i < count($systemChecks) - 1 ? 'border-b border-white/[0.09]' : '' }}">
                    <span class="w-1.5 h-1.5 rounded-full {{ $check['tone'] === 'g' ? 'bg-ledger-green' : 'bg-ledger-rust' }}"></span>
                    <span>{{ $check['label'] }}</span>
                    <span class="text-right text-paper">{{ $check['value'] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    {{-- RIGHT — auth panel --}}
    <div class="bg-paper text-ink flex flex-col justify-center px-8 md:px-14 py-12">

        <div class="font-mono text-[11px] tracking-[0.18em] uppercase text-[#8B8474]">Secure Access</div>
        <h1 class="font-display text-[30px] font-medium mt-1.5 mb-8">Authenticate</h1>

        @if ($errors->any())
            <div class="mb-5 px-4 py-3 rounded border border-ledger-rust/30 bg-ledger-rust/5 text-[13px] text-ledger-rust font-mono">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" onsubmit="this.querySelector('button[type=submit]').classList.add('opacity-80', 'cursor-not-allowed'); this.querySelector('.btn-text').classList.add('hidden'); this.querySelector('.btn-spinner').classList.remove('hidden');">
            @csrf

            <div class="mb-5">
                <label for="email" class="block text-[11px] uppercase tracking-[0.08em] text-[#6B6457] font-mono mb-2">
                    Identifier
                </label>
                <input type="email" name="email" id="email" required autofocus autocomplete="username"
                       placeholder="you@bank.example"
                       value="{{ old('email') }}"
                       class="w-full bg-white border border-[#DAD4C5] rounded px-3.5 py-3.5 font-mono text-sm text-ink outline-none focus:border-brass focus:ring-2 focus:ring-brass/20 transition-colors">
            </div>

            <div class="mb-6" x-data="{ show: false }">
                <label for="password" class="block text-[11px] uppercase tracking-[0.08em] text-[#6B6457] font-mono mb-2">
                    Passcode
                </label>
                <div class="relative">
                    <input :type="show ? 'text' : 'password'" name="password" id="password" required autocomplete="current-password"
                           placeholder="••••••••••"
                           class="w-full bg-white border border-[#DAD4C5] rounded px-3.5 py-3.5 pr-12 font-mono text-sm text-ink outline-none focus:border-brass focus:ring-2 focus:ring-brass/20 transition-colors">
                    
                    <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 text-[#8B8474] hover:text-ink transition-colors focus:outline-none" aria-label="Toggle password visibility">
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex justify-between items-center mb-7">
                <label class="flex items-center gap-2 text-[12.5px] text-[#6B6457]">
                    <input type="checkbox" name="remember" class="w-3.5 h-3.5 accent-brass">
                    Remember this device
                </label>
                <a href="#" class="text-[12.5px] text-brass font-mono hover:text-brass-soft">
                    Forgot passcode?
                </a>
            </div>

            <button type="submit"
                    class="w-full bg-ink text-brass-soft rounded py-4 text-sm font-semibold tracking-wide flex items-center justify-center gap-2 hover:bg-panel transition-all">
                <span class="btn-text flex items-center gap-2">Access Ledger <span class="font-mono text-brass">→</span></span>
                <span class="btn-spinner hidden flex items-center gap-2">
                    <svg class="animate-spin h-4 w-4 text-brass-soft" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Authenticating...
                </span>
            </button>
        </form>

        <div class="mt-7 border border-dashed border-[#D8D2C2] rounded-md px-4 py-3.5 text-[12px] leading-relaxed text-[#7A7263] font-mono">
            <span class="inline-block text-[9.5px] uppercase tracking-[0.12em] bg-brass text-ink px-1.5 py-0.5 rounded font-sans font-semibold mb-2">
                Simulation Environment
            </span><br>
            This is a system simulation environment. Use
            <code class="bg-[#EFEAE0] px-1.5 py-0.5 rounded text-ink">customer@example.com</code>,
            <code class="bg-[#EFEAE0] px-1.5 py-0.5 rounded text-ink">teller@example.com</code>,
            <code class="bg-[#EFEAE0] px-1.5 py-0.5 rounded text-ink">auditor@example.com</code>, or
            <code class="bg-[#EFEAE0] px-1.5 py-0.5 rounded text-ink">manager@example.com</code>
            with password <code class="bg-[#EFEAE0] px-1.5 py-0.5 rounded text-ink">password</code>.
        </div>
    </div>

</div>

</body>
</html>
