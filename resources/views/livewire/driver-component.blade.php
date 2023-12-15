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
    

    {{-- Table --}}
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex flex-col ">
            <h2 class="text-3xl font-semibold mb-2">Lista de Conductores </h2>
            <div class="flex flex-row justify-between mb-4 ">
                <div>
                    <button wire:click="crear"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" >
                        Agregar
                    </button>    
                </div>
                <div class="flex">
                    <select class="w-fit rounded-l-lg border-t mr-0 border-b border-l text-gray-800 bg-white px-3 py-2 pr-8 focus:outline-none" wire:model.live="buscapor">
                        <option value="dni">DNI</option>
                        <option value="name">Nombre</option>
                        <option value="lastname">Apellido</option>
                        <option value="phone">Telefono</option>
                        <option value="license_number">Numero de licencia</option>
                        <option value="license_type">Tipo de licensia</option>
                    </select>
                    <input type="text" class="w-11/12 rounded-r-lg border-t border-b border-r text-gray-800 bg-white px-3 py-2 focus:outline-none" placeholder="Buscar... " wire:model.live="search">
                </div>
            </div>

            {{-- de aca pa arriba --}}
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">

                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        DNI
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Apellido
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Teléfono
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Número de licencia
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tipo de licencia
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Fila de ejemplo -->
                                @foreach ($drivers as $driver)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$driver->dni}}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{-- Aquí puedes mostrar otros detalles de la ruta --}}
                                                {{-- Por ejemplo, la lista de paraderos --}}
                                                {{-- {{ implode(', ', $route->busstops->pluck('name')->toArray()) }} --}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$driver->name}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$driver->lastname}}</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $driver->phone }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $driver->license_number }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $driver->license_type }}
                                        </td>
                                        {{-- aca  pa arriba --}}

                                        <td class="px-6 py-4 whitespace-nowrap text-center mb-8">
                                            <button class="text-blue-600 hover:text-blue-900 focus:outline-none" wire:click="edit({{$driver->id}})">
                                                <!-- Add your edit icon here, e.g., Edit Icon from Tailwind -->
                                                <svg class="h-8 w-8 text-indigo-500" <svg width="24" height="24"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path
                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                </svg>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900 focus:outline-none" wire:click="destroy({{$driver->id}})">
                                                <!-- Add your edit icon here, e.g., Edit Icon from Tailwind -->
                                                <svg class="h-8 w-8 text-red-500" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <polyline points="3 6 5 6 21 6" />
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                    <line x1="10" y1="11" x2="10" y2="17" />
                                                    <line x1="14" y1="11" x2="14" y2="17" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $drivers->links() }}
                    </div>
                </div>
            </div>
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
