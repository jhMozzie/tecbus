<div>
    aca va ir mi trabla trip uwu  {{$usuario}}

        {{-- Table --}}
<div class="bg-white shadow rounded-lg p-6">
    <div class="flex flex-col ">
        <h2 class="text-3xl font-semibold mb-2">Lista de Viajes </h2>
        <div class="flex flex-row justify-between mb-4 ">

            <div class="flex">
                <select class="w-fit rounded-l-lg border-t mr-0 border-b border-l text-gray-800 bg-white px-3 py-2 pr-8 focus:outline-none" wire:model.live="buscapor">
                    <option value="name">Ruta</option>
                    <option value="license_plate">Bus</option>
                    <option value="driver_name">Chofer - Nombre</option>
                    <option value="driver_lastname">Chofer - Apellido</option>
                </select>
                <input type="text" class="w-11/12 rounded-r-lg border-t border-b border-r text-gray-800 bg-white px-3 py-2 focus:outline-none" placeholder="Buscar... " wire:model.live="search">
            </div>                
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">

                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ruta
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Conductor
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Bus
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    fecha
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Reserva
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Fila de ejemplo -->
                            @foreach ($trips as $trip)
                                <tr wire:key="trip-{{ $trip->id }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                           {{ $trip->route->name }}                                      
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Chofer {{ $trip->busdriver->driver->name }} {{ $trip->busdriver->driver->lastname }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Bus-{{ $trip->busdriver->bus->license_plate }} </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$trip->trip_date}}</div>
                                    </td>



                                    <td class="px-6 py-4 whitespace-nowrap text-center mb-8">
                                        <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none" wire:click="reservar({{$trip}})" {{ $reservasRealizadas[$trip['id']] ? 'disabled' : '' }}>
                                            Reservar
                                        </button>
                    
                                        <button class="ml-2 px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-700 focus:outline-none" wire:click="eliminar({{$trip['id']}})" {{ $reservasRealizadas[$trip['id']] ? '' : 'disabled' }}>
                                            Cancelar
                                        </button>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $trips->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>