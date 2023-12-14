<?php

namespace App\Livewire;

use App\Models\BusStop;
use Livewire\Component;
use Livewire\WithPagination;

class BusstopComponent extends Component
{
    use WithPagination;

    public $name;

    public $busstopid;


    //* Open Create Modal
    public $showCreateModal = false;

    public function openCreateModal()
    {
        $this->showCreateModal = true;
    }

    public function closeCreateModal()
    {
        $this->showCreateModal = false;
    }

    //* Open Edit Modal
    public $showEditModal = false;

    public function openEditModal()
    {
        $this->showEditModal = true;
    }

    public function closeEditModal()
    {
        $this->showEditModal = false;
    }


    public function save()
    {
        $this->validate([
            'name' => 'required'
        ]);

        BusStop::create([
            'name' => $this->name,
        ]);

        $this->name = '';

        // Close modal
        $this->showCreateModal = false;
    }

    public function edit($busstopid)
    {
        $this->resetValidation();
    }

    public function render()
    {
        $busstops = BusStop::paginate(10);
        return view('livewire.busstop-component', compact('busstops'));
    }
}
