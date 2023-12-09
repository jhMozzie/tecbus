<x-guest-layout>
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

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
