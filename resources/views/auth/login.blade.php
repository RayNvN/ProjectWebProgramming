<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-xl font-bold text-slate-900 dark:text-white">Welcome Back</h2>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Please enter your details to sign in to Nexa</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-2">
                <x-input-label for="password" :value="__('Password')" class="mb-0" />
                @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>
            <x-text-input id="password" class="block w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 text-indigo-600 shadow-sm focus:ring-4 focus:ring-indigo-500/10 dark:focus:ring-indigo-400/10 transition-all" name="remember">
                <span class="ml-2 text-xs font-semibold text-slate-600 dark:text-slate-400">{{ __('Keep me logged in') }}</span>
            </label>
        </div>

        <div>
            <x-primary-button>
                {{ __('Sign In') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-6 text-center border-t border-slate-100 dark:border-slate-800 pt-6">
        <p class="text-xs text-slate-500 dark:text-slate-400">
            Don't have an account? 
            <a href="{{ route('register') }}" class="font-bold text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors">
                Sign up free
            </a>
        </p>
    </div>
</x-guest-layout>
