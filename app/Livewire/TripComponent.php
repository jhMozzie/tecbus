<?php

namespace App\Livewire;

use App\Models\Bus;
use App\Models\Route;
use App\Models\Trip;
use Livewire\Component;
use Livewire\WithPagination;

class TripComponent extends Component
{

    use WithPagination;
        //variable para buscar
        public $search;
        public $buscapor = "route_id";
    // datos a completar en el formulario crear
        public $trip_date,$route_id = "",$bus_id="",$student_capacity = 35 ,$professor_capacity = 5	;
    
        // los uso para hacer los for
    public $routes,$buses;

    public $open2 =false;
    public $open =false;

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
        //se crea el nuevo bus y los guardon en bus
        $trip = Trip::create($this->only('trip_date', 'route_id', 'bus_id','student_capacity','professor_capacity'));
        $this->reset(['trip_date', 'route_id', 'bus_id','student_capacity','professor_capacity','open2']);
    }

    public function mount()
    {
        $this->routes = Route::all();
        $this->buses = Bus::all();
    }

    public function render()
    {
        $trips = Trip::where($this->buscapor,'like','%'.$this->search.'%')->paginate(1);

        return view('livewire.trip-component',compact('trips'));
    }
}
