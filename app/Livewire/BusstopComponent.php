<?php

namespace App\Livewire;

use App\Models\BusStop;
use Livewire\Component;
use Livewire\WithPagination;

class BusstopComponent extends Component
{
    use WithPagination;
    protected $table = 'busstops';

    public $name;

    public $busstopid;

    public $showModal = false;

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function edit($busstopid)
    {
        $this->resetValidation();
    }

    public function render()
    {
        $busstops = BusStop::paginate(3);
        return view('livewire.busstop-component', compact('busstops'));
    }
}
