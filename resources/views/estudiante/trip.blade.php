<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Reserva tu viaje
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8"> 
            
            @livewire('estudiantetripcomponent', ['usuario' => Auth::user() ])

        </div>
    </div>
</x-app-layout>
