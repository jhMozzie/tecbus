<div>

    {{-- Lista de posts --}}
    <div class="bg-white shadow rounded-lg p-6">
        <ul class="list-disc list-inside space-y-2">
        <table class="min-w-full leading-normal">
            <thead>
                <x-primary-button wire:click="crear">Crear</x-primary-button>
            {{-- boton selecionar --}}
            <div class="relative">
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" wire:model.live="buscapor">
                    <option value="dni">DNI</option>
                    <option value="name">Nombre</option>
                    <option value="lastname">Apellido</option>
                    <option value="phone">Telefono</option>
                    <option value="license_number">Numero de licencia</option>
                    <option value="license_type">Tipo de licensia</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 7l5 5 5-5z"/></svg>
                </div>
            </div>
            {{-- buscar por --}}
            <input type="text" class="form-control w-full" placeholder="Buscar... " wire:model.live="search">
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        DNI
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Apellido
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Teléfono
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Número de licencia
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Tipo de licencia
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($drivers as $driver)
                <tr wire:key="driver-{{$driver->id}}">
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{$driver->dni}}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{$driver->name}}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{$driver->lastname}}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{$driver->phone}}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{$driver->license_number}}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{$driver->license_type}}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <x-primary-button wire:click="edit({{$driver->id}})">Editar</x-primary-button>
                        <x-primary-button wire:click="destroy({{$driver->id}})">Eliminar</x-primary-button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
                  {{-- Formulario de editar --}}
                  @if ($open)
                  <div class="bg-gray-800 bg-opacity-25 fixed inset-0">
                      <div class="py-12">
                          <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                              <div class="bg-white shadow rounded-lg p-6">
                                 <form wire:submit="update">
                                     <!-- Reemplazo de $dni -->
                                     <div class="mb-4">
                                         <label for="create-dni">Dni</label>
                                         <input type="text" id="create-dni" class="w-full" wire:model="driveredit.edidni">
                                         {{-- modifique el input-error --}}
                                         <x-errores :messages="$errors->get('driveredit.edidni')"/>    
                                     </div>
                                 
                                     <!-- Reemplazo de $name -->
                                     <div class="mb-4">
                                         <label for="create-name">Nombre</label>
                                         <input type="text" id="create-name" class="w-full" wire:model="driveredit.ediname">
                                         {{-- modifique el input-error --}}
                                         <x-errores :messages="$errors->get('driveredit.ediname')"/>    
                                     </div>
                                 
                                     <!-- Reemplazo de $lastname -->
                                     <div class="mb-4">
                                         <label for="create-lastname">Apellido</label>
                                         <input type="text" id="create-lastname" class="w-full" wire:model="driveredit.edilastname">
                                         {{-- modifique el input-error --}}
                                         <x-errores :messages="$errors->get('driveredit.edilastname')"/>    
                                     </div>
                                 
                                     <!-- Reemplazo de $phone -->
                                     <div class="mb-4">
                                         <label for="create-phone">Teléfono</label>
                                         <input type="text" id="create-phone" class="w-full" wire:model="driveredit.ediphone">
                                         {{-- modifique el input-error --}}
                                         <x-errores :messages="$errors->get('driveredit.ediphone')"/>    
                                     </div>
                                 
                                     <!-- Reemplazo de $license_number -->
                                     <div class="mb-4">
                                         <label for="create-license-number">Número de Licencia</label>
                                         <input type="text" id="create-license-number" class="w-full" wire:model="driveredit.edilicense_number">
                                         {{-- modifique el input-error --}}
                                         <x-errores :messages="$errors->get('driveredit.edilicense_number')"/>    
                                     </div>
                                 
                                     <!-- Reemplazo de $license_type -->
                                     <div class="mb-4">
                                         <label for="create-license-type">Tipo de Licencia</label>
                                         <input type="text" id="create-license-type" class="w-full" wire:model="driveredit.edilicense_type">
                                         {{-- modifique el input-error --}}
                                         <x-errores :messages="$errors->get('driveredit.edilicense_type')"/>    
                                     </div>
                                 
                                     <!-- Resto de los campos... -->
                                 
                                     <div class="flex justify-end">
                                         <button type="button" class="mr-2" wire:click="set('open', false)">Cancelar</button>
                                         <x-primary-button>Crear</x-primary-button>
                                     </div>
                                 </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endif




</div>
