<div>
 {{-- Table --}}
 <div class="bg-white shadow rounded-lg p-6 w-full">
    <div class="flex flex-col">
        <div class="flex flex-row justify-between mb-4 py-4 ">
            <div class="flex">
                {{-- dentro de este select hare un viajes xd  --}}
                <select class="w-fit rounded-l-lg border-t mr-0 border-b border-l text-gray-800 bg-white px-3 py-2 pr-8 focus:outline-none" wire:model.live="search">
                   <option value="">Todos los abordajes</option>
                    @foreach ($viajes as $viaje)
                    <option value="{{ $viaje->id }}">
                        {{ $viaje->route->name . ' // ' . $viaje->trip_date }}
                    </option>
                @endforeach
                </select>
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
                                    usuario
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Confirmacion
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    viaje
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Fila de ejemplo -->
                            @foreach ($boardings as $boarding)
                                <tr wire:key="boarding-{{ $boarding->id }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            @foreach ($boarding->users as $user)
                                            {{ $user->name }} {{ $user->lastname }}
                                        @endforeach
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $boarding->confirmation}} </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $boarding->trip_id}}</div>
                                    </td>
                                    {{-- aca  pa arriba --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $boardings->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
