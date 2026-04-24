@include('partials.head') {{-- Mengambil meta tags, Vite, dan Flux Appearance --}}

<body class="min-h-screen bg-slate-50 dark:bg-[#0f172a] flex items-center justify-center p-6 antialiased">
    <div class="w-full max-w-sm space-y-6">
        
        {{-- Container Box --}}
        <div class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-md p-8 shadow-2xl shadow-blue-500/5">
            
            <div class="flex flex-col gap-6">
                {{-- Header --}}
                <x-auth-header 
                    :title="__('Log in to your account')" 
                    :description="__('Enter your email and password below to log in')" 
                />

                <x-auth-session-status class="text-center" :status="session('status')" />

                <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
                    @csrf

                    <flux:input
                        name="email"
                        :label="__('Email address')"
                        :value="old('email')"
                        type="email"
                        required
                        autofocus
                        autocomplete="email"
                        placeholder="email@example.com"
                    />

                    <div class="relative">
                        <flux:input
                            name="password"
                            :label="__('Password')"
                            type="password"
                            required
                            autocomplete="current-password"
                            :placeholder="__('Password')"
                            viewable
                        />

                        <!-- @if (Route::has('password.request'))
                            <flux:link class="absolute top-0 text-sm end-0" :href="route('password.request')" wire:navigate>
                                {{ __('Forgot your password?') }}
                            </flux:link>
                        @endif -->
                    </div>

                    <flux:checkbox name="remember" :label="__('Remember me')" :checked="old('remember')" />

                    <div class="flex items-center justify-end">
                        <flux:button variant="primary" type="submit" class="w-full font-bold py-3" data-test="login-button">
                            {{ __('Log in') }}
                        </flux:button>
                    </div>
                </form>
            </div>

        </div>

        {{-- Footer Optional (CopyRight) --}}
        <p class="text-center text-xs text-slate-400 uppercase tracking-widest font-bold">
            &copy; {{ date('Y') }} FIESPHERE
        </p>
    </div>

    @fluxScripts {{-- Wajib ada biar komponen Flux jalan --}}
</body>
</html>