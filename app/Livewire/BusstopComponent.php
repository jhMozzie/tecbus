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

    public $selectedBusstopId;

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

    public function openEditModal($busstopid)
    {
        $this->showEditModal = true;
        $this->selectedBusstopId = $busstopid;

        $busstop = Busstop::find($busstopid);
        $this->name = $busstop->name; // Corrección: Reemplaza "$busstop->name =-" con "$busstop->name"

        // Puedes también resetear la validación al abrir el modal de edición
        $this->resetValidation();
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

    public function update()
    {
        $this->validate([
            'name' => 'required'
        ]);

        $busstop = BusStop::find($this->selectedBusstopId);

        $busstop->update([
            'name' => $this->name
        ]);

        $this->showEditModal = false;
    }

    public function delete($busstopid)
    {
        $busstop = BusStop::find($busstopid);
        if ($busstop) {
            $busstop->delete();
            session()->flash('message', 'Paradero eliminado correctamente.');
        } else {
            session()->flash('error', 'No se pudo encontrar el paradero.');
        }
    }

    public function render()
    {
        $busstops = BusStop::paginate(10);
        return view('livewire.busstop-component', compact('busstops'));
    }
}
