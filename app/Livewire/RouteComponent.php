<?php

namespace App\Livewire;

use App\Models\Busstop;
use App\Models\Route;
use Livewire\Component;
use Livewire\WithPagination;

class RouteComponent extends Component
{

    use WithPagination;

    public $name;
    public $service_day;
    public $direction = 'Paradero Inicial a Tecsup';
    public $departure_time;
    public $turn = 'Mañana';

    // Enums Variable
    public $enumOptions = [];

    // Create Routes Variable
    // public $routes;

    // Edit Variables
    public $routeid;

    public $showModal = false;

    public function mount()
    {
        $this->enumOptions = [
            'service_day' => ['Lunes a Viernes'],
            'turn' => ['Mañana', 'Tarde', 'Noche'],
            'direction' =>  ['Paradero Inicial a Tecsup', 'Tecsup a Paradero Final'],
        ];

        // $this->routes = Route::all();
    }


    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'service_day' => 'required',
            'departure_time' => 'required',
            'turn' => 'required',
            'direction' => 'required',
        ]);

        // dd([
        //     'name' => $this->name,
        //     'service_day' => $this->enumOptions['service_day'][0],
        //     'departure_time' => $this->departure_time,
        //     'turn' => $this->turn,
        //     'direction' => $this->direction,
        // ]);

        Route::create([
            'name' => $this->name,
            'service_day' => $this->enumOptions['service_day'][0],
            'departure_time' => $this->departure_time,
            'turn' => $this->turn,
            'direction' => $this->direction,
        ]);

        // Puedes reiniciar las propiedades después de guardar
        $this->name = '';
        $this->service_day = '';
        $this->departure_time = '';
        $this->turn = '';
        $this->direction = '';

        // Close modal
        $this->showModal = false;
    }

    public function edit($routeid)
    {
        $this->resetValidation();
    }
    public function render()
    {
        $routes = Route::paginate(2);
        return view('livewire.route-component', compact('routes'));
    }
}
