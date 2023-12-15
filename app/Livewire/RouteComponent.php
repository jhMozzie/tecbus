<?php

namespace App\Livewire;

use App\Models\Route;
use Livewire\Component;
use Livewire\WithPagination;

class RouteComponent extends Component
{

    use WithPagination;

    public $name;
    public $service_day = 'Lunes a Viernes';
    public $direction = '';
    public $departure_time;
    public $turn = '';

    // Enums Variable
    public $enumOptions = [];

    // Create Routes Variable
    // public $routes;

    public $showCreateModal = false;
    public $showEditModal = false;

    // Edit Variables
    public $routeIdBeingEdited;

    public function mount()
    {
        $this->enumOptions = [
            'service_day' => ['Lunes a Viernes'],
            'turn' => ['Mañana', 'Tarde', 'Noche'],
            'direction' =>  ['Paradero Inicial a Tecsup', 'Tecsup a Paradero Final'],
        ];
    }


    public function openCreateModal()
    {
        $this->showCreateModal = true;
    }

    public function closeCreateModal()
    {
        $this->showCreateModal = false;
    }

    public function closeEditModal()
    {
        $this->showEditModal = false;
    }


    public function save()
    {
        // dd($this->turn);

        $this->validate([
            'name' => 'required',
            'service_day' => 'required',
            'departure_time' => 'required',
            'turn' => 'required',
            'direction' => 'required',
        ]);

        // dd($this->name, $this->enumOptions['service_day'][0], $this->departure_time, $this->turn, $this->direction);

        Route::create([
            'name' => $this->name,
            'service_day' => $this->service_day,
            'departure_time' => $this->departure_time,
            'turn' => $this->turn,
            'direction' => $this->direction,
        ]);

        // dd($this->name, $this->enumOptions['service_day'][0], $this->departure_time, $this->turn, $this->direction);


        // Puedes reiniciar las propiedades después de guardar
        $this->name = '';
        $this->service_day = '';
        $this->departure_time = '';
        $this->turn = '';
        $this->direction = '';

        // Close modal
        $this->showCreateModal = false;
    }

    public function edit($routeid)
    {
        $this->resetValidation();
        $this->showEditModal = true;
        $route = Route::find($routeid);

        // Configurar las propiedades con los valores del modelo
        $this->name = $route->name;
        $this->service_day = $route->service_day;
        $this->departure_time = $route->departure_time;
        $this->turn = $route->turn;
        $this->direction = $route->direction;

        // Guardar el ID del modelo para su posterior uso en el método update
        $this->routeIdBeingEdited = $route->id;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'service_day' => 'required',
            'departure_time' => 'required',
            'turn' => 'required',
            'direction' => 'required',
        ]);


        $route = Route::find($this->routeIdBeingEdited);

        if ($route) {
            $route->update([
                'name' => $this->name,
                'service_day' => $this->service_day,
                'departure_time' => $this->departure_time,
                'turn' => $this->turn,
                'direction' => $this->direction,
            ]);

            // Limpiar variables después de la actualización
            $this->reset([
                'name', 'service_day', 'departure_time', 'turn', 'direction', 'routeIdBeingEdited'
            ]);

            // $this->emit('routeUpdated');

            // Cerrar el modal de edición
            $this->showEditModal = false;
        }
    }

    public function destroy($routeid)
    {
        $route = Route::find($routeid);

        if ($route) {
            $route->delete();

            // También puedes emitir un evento Livewire aquí si es necesario
            // $this->emit('routeDeleted');

            // Recargar la lista de rutas después de borrar
            $this->render();
        }
    }

    public function render()
    {
        $routes = Route::paginate(5);
        return view('livewire.route-component', compact('routes'));
    }
}
