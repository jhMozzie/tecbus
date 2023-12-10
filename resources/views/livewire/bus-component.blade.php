<div>
    


    {{-- Lista de posts --}}
    <div class="bg-white shadow rounded-lg p-6">
        <ul class="list-disc list-inside space-y-2">
            <x-primary-button wire:click="crear">Crear</x-primary-button>
            @foreach ($buses as $bus)
            <li class="flex justify-between" wire:key="post-{{$bus->id}}"> {{$bus->model}}
                <div>
                    <x-primary-button wire:click="edit({{$bus->id}})">Editar</x-primary-button> 
                    <x-primary-button wire:click="destroy({{$bus->id}})">Eliminar</x-primary-button>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="mt-4">
            {{$buses->links()}}
        </div>
    </div>
     {{-- Formulario de crear --}}
     @if ($open2)
     <div class="bg-gray-800 bg-opacity-25 fixed inset-0">
         <div class="py-12">
             <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                 <div class="bg-white shadow rounded-lg p-6">
                    <form wire:submit="save">
                        <div class="mb-4">
                            <label for="create-model">Modelos</label>
                            <input type="text" id="create-model" class="w-full" wire:model="model">
                             {{-- modifique el input-error --}}
                             <x-errores :messages="$errors->get('model')"/>    
                        </div>
                        <div class="mb-4">
                            <label for="create-brand">Marca</label>
                            <input type="text" id="create-brand" class="w-full" wire:model="brand">
                              {{-- modifique el input-error --}}
                              <x-errores :messages="$errors->get('brand')"/>                            
                        </div>
                        <div class="mb-4">
                            <label for="create-soat">Soat</label>
                            <input type="text" id="create-soat" class="w-full" wire:model="soat">
                             {{-- modifique el input-error --}}
                             <x-errores :messages="$errors->get('soat')"/>                         
                        </div>
                        <div class="mb-4">
                            <label for="create-capacity">Capacidad</label>
                            <input type="text" id="create-capacity" class="w-full" wire:model="capacity">
                             {{-- modifique el input-error --}}
                             <x-errores :messages="$errors->get('capacity')"/>                         
                        </div>
                        <div class="mb-4">
                            <label>Conductores</label>
                            <div>
                                @foreach ($drivers as $driver)
                                    <div class="mb-2">
                                        <label>
                                            <input type="checkbox" wire:model="chofer" value="{{$driver->id}}">
                                            {{$driver->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <x-input-error :messages="$errors->get('chofer')"/>
                                <div class="flex justify-end">
                                    <button type="button" class="mr-2" wire:click="set('open2', false)">Cancelar</button>
                                    <x-primary-button>Crear</x-primary-button>
                                </div>
                        </div>
                    </form>
                 </div>
             </div>
         </div>
     </div>
     @endif


     {{-- Formulario de actualizar --}}
     @if ($open)
     <div class="bg-gray-800 bg-opacity-25 fixed inset-0">
         <div class="py-12">
             <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                 <div class="bg-white shadow rounded-lg p-6">
                    <form wire:submit="update">
                        <div class="mb-4">
                            <label for="create-model">Modelos</label>
                            <input type="text" id="create-model" class="w-full" wire:model="busedit.v_model">
                             {{-- modifique el input-error --}}
                             <x-errores :messages="$errors->get('busedit.v_model')"/>    
                        </div>
                        <div class="mb-4">
                            <label for="create-brand">Marca</label>
                            <input type="text" id="create-brand" class="w-full" wire:model="busedit.v_brand">
                              {{-- modifique el input-error --}}
                              <x-errores :messages="$errors->get('busedit.v_brand')"/>    
                        </div>
                        <div class="mb-4">
                            <label for="create-soat">Soat</label>
                            <input type="text" id="create-soat" class="w-full" wire:model="busedit.v_soat">
                             {{-- modifique el input-error --}}
                             <x-errores :messages="$errors->get('busedit.v_soat')"/>    
                        </div>
                        <div class="mb-4">
                            <label for="create-capacity">Capacidad</label>
                            <input type="text" id="create-capacity" class="w-full" wire:model="busedit.v_capacity">
                             {{-- modifique el input-error --}}
                             <x-errores :messages="$errors->get('busedit.v_capacity')"/>    
                        </div>
                        <div class="mb-4">
                            <label>Conductores</label>
                            <div>
                                @foreach ($drivers as $driver)
                                    <div class="mb-2">
                                        <label>
                                            <input type="checkbox" wire:model="busedit.v_chofer" value="{{$driver->id}}">
                                            {{$driver->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <x-errores :messages="$errors->get('busedit.v_chofer')"/>    
                                <div class="flex justify-end">
                                    <button type="button" class="mr-2" wire:click="set('open', false)">Cancelar</button>
                                    <x-primary-button>Crear</x-primary-button>
                                </div>
                        </div>
                    </form>
                 </div>
             </div>
         </div>
     </div>
     @endif








</div>
