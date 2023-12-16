<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-5xl lg:w-screen">

<div class="hidden lg:block lg:w-1/2 bg-cover bg-[url('/public/img/img-bus.png')]"></div>
<div class="lg:w-1/2 w-full py-16 px-16 pr-16 pl-16">
    <a href="/" wire:navigate class="flex items-center justify-center py-2">
        <x-application-logo class="w-20 h-20 fill-current text-sky-600 " />
    </a>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label class="block text-gray-700 text-sm font-bold mb-2" for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full bg-gray-100 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="block text-gray-700 text-sm font-bold mb-2" for="password" :value="__('Contraseña')" />

            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full bg-gray-100 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                type="password"
                name="password"
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-sky-600 shadow-sm focus:ring-sky-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                </label>
            </div>

            <div class="py-4 flex items-center justify-center">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-center text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif
            </div>

            <div class="py-4">
                <button class="bg-sky-500 text-white font-bold py-2 px-4 w-full rounded hover:bg-sky-400">{{ __('Iniciar sesión') }}</button>
            </div>

            <div class="flex items-center justify-center p-4">
                <p class="lg:text-m text-gray-600 text-center">¿Eres nuevo?</p>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="toggleColour inline-block text-sky-600 no-underline hover:text-sky-300 hover:text-underline py-2 px-4 " wire:navigate>Registrarse</a>
                @endif
            </div>
    </form>
</div>
</div>

</x-guest-layout>
