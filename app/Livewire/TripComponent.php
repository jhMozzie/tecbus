<?php

namespace App\Livewire;

use App\Models\Bus;
use App\Models\Route;
use App\Models\Trip;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class TripComponent extends Component
{

    use WithPagination;
        //variable para buscar
        public $search;
        public $buscapor = "name";
    // datos a completar en el formulario crear
        public $trip_date,$route_id = "",$bus_id="",$student_capacity = 35 ,$professor_capacity = 5	;
    
        // los uso para hacer los for
    public $routes,$buses;

    public $open2 =false;
    public $open =false;

    // estas variables son para el editar
    public $tripid = '';
    public $tripedit = [
        'route_id' => '',
        'bus_id' => '',
        'student_capacity' => '',
        'professor_capacity' => '',
        'trip_date' => ''
    ];

    public function crear(){
            $this->resetValidation();
            $this->open2 = true;
    }

    public function save()
    {
        //validaciones para mi create son a los campos que tiene como valor en la vista
        $this->validate([
            'trip_date' => 'required',
            'route_id' => 'required',
            'bus_id' => 'required',
            'student_capacity' => 'required',
            'professor_capacity' => 'required',
        ]);

            // Convierte el string de fecha a un objeto Carbon
        $tripDate = Carbon::parse($this->trip_date);

        //se crea el nuevo bus y los guardon en bus
        $trip = Trip::create([
            'trip_date' => $tripDate,
            'route_id' => $this->route_id,
            'bus_id' => $this->bus_id,
            'student_capacity' => $this->student_capacity,
            'professor_capacity' => $this->professor_capacity,
        ]);
        //$trip = Trip::create($this->only('trip_date', 'route_id', 'bus_id','student_capacity','professor_capacity'));
        $this->reset(['trip_date', 'route_id', 'bus_id','student_capacity','professor_capacity','open2']);
    }

    public function edit($id)
    {
        //falta poner el validate de este campo

        $this->resetValidation();
        //abre el pedaso de codigo 
        $this->open = true;
        $trip = Trip::find($id);
        $this->tripid = $id;
        //dd($this->tripid);
        $this->tripedit['route_id'] = $trip->route_id;
        $this->tripedit['bus_id'] = $trip->bus_id;
        $this->tripedit['student_capacity'] = $trip->student_capacity;
        $this->tripedit['professor_capacity'] = $trip->professor_capacity;
        $this->tripedit['trip_date'] = $trip->trip_date->toDateString();

    }

    public function update()
    {
    

    // Validadores para los campos de actualización
    $this->validate([
        'tripedit.route_id' => 'required',
        'tripedit.bus_id' => 'required',
        'tripedit.student_capacity' => 'required',
        'tripedit.professor_capacity' => 'required',
        'tripedit.trip_date' => 'required', // Aseguramos que sea una fecha válida
    ]);

    $trip = Trip::find($this->tripid);
    // Actualizamos los campos
    $trip->update([
        'route_id' => $this->tripedit['route_id'],
        'bus_id' => $this->tripedit['bus_id'],
        'student_capacity' => $this->tripedit['student_capacity'],
        'professor_capacity' => $this->tripedit['professor_capacity'],
        'trip_date' => Carbon::parse($this->tripedit['trip_date']), // Convertimos a objeto Carbon
    ]);

    // Reseteo también el estado para cerrar el formulario de edición
    $this->reset(['tripid', 'tripedit', 'open']);
    }

    public function destroy($tripid)
    {
        $trip = Trip::find($tripid);
        $trip->delete();
    }

    public function mount()
    {
        $this->routes = Route::all();
        $this->buses = Bus::all();
    }

    public function render()
    {
        $trips = Trip::where(function($query) {
            $query->whereHas('route', function($subquery) {
                    $subquery->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('bus', function($subquery) {
                    $subquery->where('license_plate', 'like', '%' . $this->search . '%');
                });
        })
        ->paginate(3);

    return view('livewire.trip-component', compact('trips'));
    }
}
