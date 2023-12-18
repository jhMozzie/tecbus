<?php

namespace App\Livewire;

use App\Models\Boarding;
use App\Models\Trip;
use Livewire\Component;
use Livewire\WithPagination;

class BoardingComponent extends Component
{
    use WithPagination;
    //variable para buscar
    public $search = "";
    
    public $viajes;

    public function mount(){
        $this->viajes = Trip::with('route')->get();
    }

    public function render()
    {
        $boardings = Boarding::with('users')
            ->when($this->search && $this->search !== 'todos', function ($query) {
                $query->where('trip_id', '=', $this->search);
            })
            ->paginate(10);
    
        $viajes = Trip::all(); // O cualquier lógica para obtener los viajes
    
        return view('livewire.boarding-component', compact('boardings', 'viajes'));
    }
    
}
