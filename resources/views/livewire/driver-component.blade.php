<div>

    {{-- Lista de posts --}}
    <div class="bg-white shadow rounded-lg p-6">
        <ul class="list-disc list-inside space-y-2">
            <x-primary-button wire:click="crear">Crear</x-primary-button>
            @foreach ($drivers as $driver)
            <li class="flex justify-between" wire:key="post-{{$driver->id}}"> {{$driver->name}}
                <div>
                    <x-primary-button wire:click="edit({{$driver->id}})">Editar</x-primary-button> 
                    <x-primary-button wire:click="destroy({{$driver->id}})">Eliminar</x-primary-button>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="mt-4">
            {{$drivers->links()}}
        </div>
    </div>

         {{-- Formulario de crear --}}
         @if ($open2)
         <div class="bg-gray-800 bg-opacity-25 fixed inset-0">
             <div class="py-12">
                 <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                     <div class="bg-white shadow rounded-lg p-6">
                        <form wire:submit="save">
                            <!-- Reemplazo de $dni -->
                            <div class="mb-4">
                                <label for="create-dni">Dni</label>
                                <input type="text" id="create-dni" class="w-full" wire:model="dni">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('dni')"/>    
                            </div>
                        
                            <!-- Reemplazo de $name -->
                            <div class="mb-4">
                                <label for="create-name">Nombre</label>
                                <input type="text" id="create-name" class="w-full" wire:model="name">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('name')"/>    
                            </div>
                        
                            <!-- Reemplazo de $lastname -->
                            <div class="mb-4">
                                <label for="create-lastname">Apellido</label>
                                <input type="text" id="create-lastname" class="w-full" wire:model="lastname">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('lastname')"/>    
                            </div>
                        
                            <!-- Reemplazo de $phone -->
                            <div class="mb-4">
                                <label for="create-phone">Teléfono</label>
                                <input type="text" id="create-phone" class="w-full" wire:model="phone">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('phone')"/>    
                            </div>
                        
                            <!-- Reemplazo de $license_number -->
                            <div class="mb-4">
                                <label for="create-license-number">Número de Licencia</label>
                                <input type="text" id="create-license-number" class="w-full" wire:model="license_number">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('license_number')"/>    
                            </div>
                        
                            <!-- Reemplazo de $license_type -->
                            <div class="mb-4">
                                <label for="create-license-type">Tipo de Licencia</label>
                                <input type="text" id="create-license-type" class="w-full" wire:model="license_type">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('license_type')"/>    
                            </div>
                        
                            <!-- Resto de los campos... -->
                        
                            <div class="flex justify-end">
                                <button type="button" class="mr-2" wire:click="set('open2', false)">Cancelar</button>
                                <x-primary-button>Crear</x-primary-button>
                            </div>
                        </form>
                     </div>
                 </div>
             </div>
         </div>
         @endif


</div>
