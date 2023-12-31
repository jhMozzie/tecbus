<nav x-data="{ open: false }" class="gradient border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 lg:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img id="logoImg" src="/img/logo-white.png" class="block h-9 w-auto fill-current text-white">
                    </a>
                </div>

                <!-- Navigation Links -->
                @if (auth()->check())
                    @switch(auth()->user()->userType->name)
                        @case('Estudiante')
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 xl:flex text-2xl">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                                    {{ __('Inicio') }}
                                </x-nav-link>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 xl:flex">
                                <x-nav-link :href="route('/estudiante/trip')" :active="request()->routeIs('/estudiante/trip')" wire:navigate>
                                    Viajes y reserva
                                </x-nav-link>
                            </div>
                        @break

                        @case('Profesor')
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 xl:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                                    {{ __('Inicio') }}
                                </x-nav-link>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 xl:flex">
                                <x-nav-link :href="route('/profesor/trip')" :active="request()->routeIs('/profesor/trip')" wire:navigate>
                                    Viajes y reserva
                                </x-nav-link>
                            </div>
                        @break

                        @case('Administrador')
                            <div class="hidden sm:flex sm:items-center sm:ms-6">
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 xl:flex">
                                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                                        {{ __('Inicio') }}
                                    </x-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 xl:flex">
                                    <x-nav-link :href="route('/admin/trip')" :active="request()->routeIs('/admin/trip')" wire:navigate>
                                        Viajes
                                    </x-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 xl:flex">
                                    <x-nav-link :href="route('/admin/route')" :active="request()->routeIs('/admin/route')" wire:navigate>
                                        Rutas
                                    </x-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 xl:flex">
                                    <x-nav-link :href="route('/admin/busstop')" :active="request()->routeIs('/admin/busstop')" wire:navigate>
                                        Paraderos
                                    </x-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 xl:flex">
                                 <x-dropdown align="left">
                                        <x-slot name="trigger">
                                            <button
                                                class="group inline-flex items-center space-x-2 text-sm font-medium text-white hover:text-sky-300 focus:outline-none transition ease-in-out duration-150">
                                                <span>Administrar</span>
                                                <svg class="fill-current h-4 w-4 transform group-hover:rotate-180 transition-transform duration-150"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 12l-8-8 1.5-1.5L10 9l6.5-6.5L18 4z" />
                                                </svg>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('/admin/user')" :active="request()->routeIs('/admin/user')" wire:navigate
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                Usuarios
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('/admin/user_type')" :active="request()->routeIs('/admin/user_type')" wire:navigate
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                Tipo de usuarios
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 xl:flex">
                                    <x-nav-link :href="route('/admin/driver')" :active="request()->routeIs('/admin/driver')" wire:navigate>
                                        Conductores
                                    </x-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 xl:flex">
                                    <x-nav-link :href="route('/admin/bus')" :active="request()->routeIs('/admin/bus')" wire:navigate>
                                        Buses
                                    </x-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 xl:flex">
                                    <x-nav-link :href="route('/admin/boarding')" :active="request()->routeIs('/admin/boarding')" wire:navigate>
                                        Abordaje
                                    </x-nav-link>
                                </div>
                            </div>
                        @break

                        @case('Chofer')
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 xl:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                                    {{ __('Inicio') }}
                                </x-nav-link>
                            </div>
                        @break
                    @endswitch
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden xl:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center xl:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden xl:hidden">
        <div class="pt-4 pb-1 border-t border-gray-200">
        @if (auth()->check())
            @switch(auth()->user()->userType->name)
                        @case('Estudiante')
                            <div class="">
                                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                                    {{ __('Inicio') }}
                                </x-responsive-nav-linkk>
                            </div>
                            <div class="">
                                <x-responsive-nav-link :href="route('/estudiante/trip')" :active="request()->routeIs('/estudiante/trip')" wire:navigate>
                                    Viajes y reserva
                                </x-responsive-nav-link>
                            </div>
                        @break

                        @case('Profesor')
                            <div class="">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                            </div>
                            <div class="">
                                <x-nav-link :href="route('/profesor/trip')" :active="request()->routeIs('/profesor/trip')" wire:navigate>
                                    Viajes y reserva
                                </x-nav-link>
                            </div>
                        @break

                        @case('Administrador')
                            <div class="">
                                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    {{ __('Inicio') }}
                                </x-responsive-nav-link>

                                <x-responsive-nav-link :href="route('/admin/trip')" :active="request()->routeIs('/admin/trip')">
                                    Viajes
                                </x-responsive-nav-link>

                               
                                <x-responsive-nav-link :href="route('/admin/route')" :active="request()->routeIs('/admin/route')">
                                    Rutas
                                </x-responsive-nav-link>

                                <x-responsive-nav-link :href="route('/admin/busstop')" :active="request()->routeIs('/admin/busstop')" >
                                    Paraderos
                                </x-responsive-nav-link>

                                <x-responsive-dropdown align="left">
                                    <x-slot name="trigger">
                                        <button
                                            class="group inline-flex items-center space-x-2 text-sm font-medium text-white hover:text-sky-300 focus:outline-none transition ease-in-out duration-150">
                                            <span>Administrar</span>
                                            <svg class="fill-current h-4 w-4 transform group-hover:rotate-180 transition-transform duration-150"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 12l-8-8 1.5-1.5L10 9l6.5-6.5L18 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('/admin/user')" :active="request()->routeIs('/admin/user')" 
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Usuarios
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('/admin/user_type')" :active="request()->routeIs('/admin/user_type')" 
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Tipo de usuarios
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-responsive-dropdown>

                                <x-responsive-nav-link :href="route('/admin/driver')" :active="request()->routeIs('/admin/driver')">
                                    Conductores
                                </x-responsive-nav-link>
                               
                                <x-responsive-nav-link :href="route('/admin/bus')" :active="request()->routeIs('/admin/bus')">
                                    Buses
                                </x-responsive-nav-link>

                                <x-responsive-nav-link :href="route('/admin/boarding')" :active="request()->routeIs('/admin/boarding')">
                                    Abordaje
                                </x-responsive-nav-link>
                        @break

                        @case('Chofer')
                            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Inicio') }}
                            </x-responsive-nav-link>

                        @break
            @endswitch
        @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" >
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();" :active="request()->routeIs('logout')">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
