<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profesor
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (auth()->check())
                    @switch(auth()->user()->userType->name)
                        @case('Estudiante')
                            <h1>Bienvenido, Estudiante</h1>
                            {{-- Agrega aquí el contenido específico para estudiantes --}}
                            {{-- @livewire('estudiante-component') --}}
                        @break

                        @case('Profesor')
                            <h1>Bienvenido, Profesor</h1>
                            {{-- Agrega aquí el contenido específico para profesores --}}
                            {{-- @livewire('profesor-component') --}}
                        @break

                        @case('Administrador')
                            <h1>Bienvenido, Administrador</h1>
                            {{-- Agrega aquí el contenido específico para administradores --}}
                            {{-- @livewire('admin-component') --}}
                        @break

                        @case('Chofer')
                        <h1>Bienvenido, Chofer</h1>
                        {{-- Agrega aquí el contenido específico para administradores --}}
                        {{-- @livewire('admin-component') --}}
                        @break

                        @default
                            <h1>¡Estás conectado!</h1>
                    @endswitch
                @else
                    <h1>¡No estás conectado!</h1>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
