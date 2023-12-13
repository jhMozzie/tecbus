<div>
    


    {{-- Lista de posts --}}
    
    <div class="bg-white shadow rounded-lg p-6">
        <ul class="list-disc list-inside space-y-2">
            {{-- boton crear --}}
            <x-primary-button wire:click="crear">Crear</x-primary-button>
            {{-- boton selecionar --}}
            <div class="relative">
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" wire:model.live="buscapor">
                    <option value="model">modelo</option>
                    <option value="soat">soat</option>
                    <option value="capacity">capacidad</option>
                    <option value="brand">marca</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 7l5 5 5-5z"/></svg>
                </div>
            </div>
            {{-- buscar por --}}
            <input type="text" class="form-control w-full" placeholder="Buscar... " wire:model.live="search">
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
