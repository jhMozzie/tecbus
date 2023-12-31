<div>

    {{-- Lista de posts --}}

    

    {{-- Table --}}
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex flex-col ">
            <div class="flex flex-row justify-between mb-4 py-4">
                <div class="flex w-3/6">
                    <select class="w-3/6 focus:border-sky-400 rounded-l-lg border-t mr-0 border-b border-l text-gray-800 bg-white px-3 py-2 pr-8 focus:outline-none" wire:model.live="buscapor">
                        <option value="dni">DNI</option>
                        <option value="name">Nombre</option>
                        <option value="lastname">Apellido</option>
                        <option value="phone">Telefono</option>
                        <option value="license_number">Numero de licencia</option>
                        <option value="license_type">Tipo de licencia</option>
                    </select>
                    <input type="text" class="w-3/6 focus:border-sky-400 rounded-r-lg border-t border-b border-r text-gray-800 bg-white px-3 py-2 focus:outline-none" placeholder="Buscar... " wire:model.live="search">
                </div>
                <div>
                    <button wire:click="crear"
                        class="bg-sky-500 hover:bg-sky-400 text-white font-bold py-2 px-4 rounded lg:text-base" >
                        Agregar
                    </button>    
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
                                                <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M420.182-384Q405-384 394.5-394.297q-10.5-10.298-10.5-25.52v-86.856Q384-521 389-534q5-13 15.659-23.659L738-891q11-11 24-16t26.5-5q14.4 0 27.45 5 13.05 5 23.991 15.783L891-840q11 11 16 24.182 5 13.182 5 26.818 0 13.661-5.022 26.866Q901.957-748.929 891-738L557.659-404.659Q547-394 534.05-389q-12.949 5-27.239 5h-86.629ZM789-738l51-51-51-51-51 51 51 51ZM216-144q-29.7 0-50.85-21.15Q144-186.3 144-216v-528q0-30.112 21-51.556T216-816h346L333-587q-11 11-16 23.98t-5 27.302v152.178Q312-354 333.106-333q21.105 21 50.743 21H535.63q14.37 0 27.37-5 13-5 24-16l229-229v346q0 29.7-21.15 50.85Q773.7-144 744-144H216Z"/></svg>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900 focus:outline-none" wire:click="destroy({{$driver->id}})">
                                                <!-- Add your edit icon here, e.g., Edit Icon from Tailwind -->
                                                <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-12q-15.3 0-25.65-10.289-10.35-10.29-10.35-25.5Q192-747 202.35-757.5 212.7-768 228-768h156v-12q0-15.3 10.35-25.65Q404.7-816 420-816h120q15.3 0 25.65 10.35Q576-795.3 576-780v12h156q15.3 0 25.65 10.289 10.35 10.29 10.35 25.5Q768-717 757.65-706.5 747.3-696 732-696h-12v479.566Q720-186 698.85-165 677.7-144 648-144H312Zm107.789-144Q435-288 445.5-298.35 456-308.7 456-324v-264q0-15.3-10.289-25.65-10.29-10.35-25.5-10.35Q405-624 394.5-613.65 384-603.3 384-588v264q0 15.3 10.289 25.65 10.29 10.35 25.5 10.35Zm120 0Q555-288 565.5-298.35 576-308.7 576-324v-264q0-15.3-10.289-25.65-10.29-10.35-25.5-10.35Q525-624 514.5-613.65 504-603.3 504-588v264q0 15.3 10.289 25.65 10.29 10.35 25.5 10.35Z"/></svg>
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
             <div class="py-12 fixed inset-0 z-10 overflow-y-auto">
                 <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0 w-auto">
                     <div class="bg-white shadow text-left rounded-lg p-6 sm:w-3/6">
                        <form wire:submit="save" class="grid grid-cols-1 gap-6 sm:grid-cols-2 w-full">
                            <!-- Reemplazo de $dni -->
                            <div class="mb-4">
                                <label for="create-dni">DNI</label>
                                <input type="text" id="create-dni" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="dni">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('dni')"/>    
                            </div>
                        
                            <!-- Reemplazo de $name -->
                            <div class="mb-4">
                                <label for="create-name">Nombre</label>
                                <input type="text" id="create-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="name">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('name')"/>    
                            </div>
                        
                            <!-- Reemplazo de $lastname -->
                            <div class="mb-4">
                                <label for="create-lastname">Apellido</label>
                                <input type="text" id="create-lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="lastname">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('lastname')"/>    
                            </div>
                        
                            <!-- Reemplazo de $phone -->
                            <div class="mb-4">
                                <label for="create-phone">Teléfono</label>
                                <input type="text" id="create-phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="phone">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('phone')"/>    
                            </div>
                        
                            <!-- Reemplazo de $license_number -->
                            <div class="">
                                <label for="create-license-number">Número de Licencia</label>
                                <input type="text" id="create-license-number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="license_number">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('license_number')"/>    
                            </div>
                        
                            <!-- Reemplazo de $license_type -->
                            <div class="">
                                <label for="create-license-type">Tipo de Licencia</label>
                                <select id="create-license-type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="license_type">
                                    <option selected>Elija el tipo de licencia</option>
                                    <option value="A-IIIA">A-IIIa</option>
                                    <option value="A-IIIB">A-IIIb</option>
                                    <option value="A-IIIC">A-IIIc</option>
                                </select>
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('license_type')"/>    
                            </div>    
                            <div>

                            </div>
                            <div class="flex justify-end py-2">
                                <x-primary-button>Crear</x-primary-button>
                                <button type="button" class=" px-6" wire:click="set('open2', false)">Cancelar</button>
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
                      <div class="py-12 fixed inset-0 z-10 overflow-y-auto">
                          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0 w-auto">
                              <div class="bg-white shadow text-left rounded-lg p-6 sm:w-3/6">
                                 <form wire:submit="update" class="grid grid-cols-1 gap-6 sm:grid-cols-2 w-full">
                                     <!-- Reemplazo de $dni -->
                                     <div class="mb-4">
                                         <label for="create-dni">Dni</label>
                                         <input type="text" id="create-dni" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="driveredit.edidni">
                                         {{-- modifique el input-error --}}
                                         <x-errores :messages="$errors->get('driveredit.edidni')"/>    
                                     </div>
                                 
                                     <!-- Reemplazo de $name -->
                                     <div class="mb-4">
                                         <label for="create-name">Nombre</label>
                                         <input type="text" id="create-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="driveredit.ediname">
                                         {{-- modifique el input-error --}}
                                         <x-errores :messages="$errors->get('driveredit.ediname')"/>    
                                     </div>
                                 
                                     <!-- Reemplazo de $lastname -->
                                     <div class="mb-4">
                                         <label for="create-lastname">Apellido</label>
                                         <input type="text" id="create-lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="driveredit.edilastname">
                                         {{-- modifique el input-error --}}
                                         <x-errores :messages="$errors->get('driveredit.edilastname')"/>    
                                     </div>
                                 
                                     <!-- Reemplazo de $phone -->
                                     <div class="mb-4">
                                         <label for="create-phone">Teléfono</label>
                                         <input type="text" id="create-phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="driveredit.ediphone">
                                         {{-- modifique el input-error --}}
                                         <x-errores :messages="$errors->get('driveredit.ediphone')"/>    
                                     </div>
                                 
                                     <!-- Reemplazo de $license_number -->
                                     <div class="">
                                         <label for="create-license-number">Número de Licencia</label>
                                         <input type="text" id="create-license-number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="driveredit.edilicense_number">
                                         {{-- modifique el input-error --}}
                                         <x-errores :messages="$errors->get('driveredit.edilicense_number')"/>    
                                     </div>
                                 
                                     <!-- Reemplazo de $license_type -->
                                     <div class="">
                                         <label for="create-license-type">Tipo de Licencia</label>
                                         <select id="create-license-type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="driveredit.edilicense_type">
                                            <option selected>Elija el tipo de licencia</option>
                                            <option value="A-IIIA">A-IIIa</option>
                                            <option value="A-IIIB">A-IIIb</option>
                                            <option value="A-IIIC">A-IIIc</option>
                                        </select>
                                         {{-- modifique el input-error --}}
                                         <x-errores :messages="$errors->get('driveredit.edilicense_type')"/>    
                                     </div>
                                    
                                     <div>

                                     </div>
                                     <!-- Resto de los campos... -->
                                 
                                     <div class="flex justify-end py-2">
                                        <x-primary-button>Crear</x-primary-button>
                                         <button type="button" class="px-6" wire:click="set('open', false)">Cancelar</button>
                                     </div>
                                 </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endif
</div>
