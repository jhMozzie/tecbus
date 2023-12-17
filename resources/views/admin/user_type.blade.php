<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de tipo de usuarios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8"> 
            @livewire('UserTypeComponent') 
        </div>
    </div>
</x-app-layout>