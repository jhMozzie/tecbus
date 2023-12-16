<x-guest-layout>
<div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-5xl lg:w-screen">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="lg:w-1/2 w-full py-16 px-16 pr-16 pl-16">
            <a href="/" wire:navigate class="flex items-center justify-center py-4">
                <x-application-logo class="w-20 h-20 fill-current text-sky-600 " />
            </a>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="flex mt-4">
            <div class="w-full md:w-1/2 mr-2">
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="w-full md:w-1/2 ml-2">
                <x-input-label for="lastname" :value="__('Apellido')" />
                <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')"
                    placeholder="" />
                <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
            </div>
        </div>

        <div class="flex mt-4">
            <div class="w-full md:w-1/2 mr-2">
                <x-input-label for="phone" :value="__('Telefono')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                    required autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
            </div>
            <div class="w-full md:w-1/2 ml-2">
                <x-input-label for="dni" :value="__('DNI')" />
                <x-text-input id="dni" class="block mt-1 w-full" type="number" name="dni" :value="old('dni')"
                    placeholder="" />
                <x-input-error :messages="$errors->get('dni')" class="mt-2" />
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <div class="flex">
                <x-text-input id="email" class="w-full p-2 border border-gray-300 rounded-l" type="text"
                    name="email" :value="old('email')" placeholder="Enter your email" required autocomplete="email" />
                <input type="text" value="@tecsup.edu.pe"
                    class="w-36 p-2 border border-l-0 border-gray-300 rounded-r text-gray-500" readonly />
            </div>
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->first('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->first('password_confirmation')" class="mt-2" />
        </div>

                <div class="py-4">
                    <button class="bg-sky-500 text-white font-bold py-2 px-4 w-full rounded hover:bg-sky-400">{{ __('Registrarse') }}</button>
                </div>

                    <div class="flex items-center justify-center p-4">
                        <p class="lg:text-m text-gray-600 text-center">¿Ya tienes una cuenta?</p>
                        <a class="toggleColour inline-block text-sky-600 no-underline hover:text-sky-300 hover:text-underline py-2 px-4" href="{{ route('login') }}" wire:navigate>
                        {{ __('Iniciar sesión') }}
                        </a>
                    </div>

            </form>
        </div>
        <div class="hidden lg:block lg:w-1/2 bg-cover bg-[url('/public/img/bus-stop.png')]"></div>
    </div>
</x-guest-layout>
