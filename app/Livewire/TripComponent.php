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

        public $trip_date,$route_id,$bus_id	;

    public $routes,$buses;

    public $open2 =false;
    public $open =false;

    public function crear(){
            $this->resetValidation();
            $this->open2 = true;
    }

    public function mount()
    {
        $this->routes = Route::all();
        $this->buses = Bus::all();
    }

    public function render()
    {
        $trips = Trip::where($this->buscapor,'like','%'.$this->search.'%')->paginate(10);

        return view('livewire.trip-component',compact('trips'));
    }
}
