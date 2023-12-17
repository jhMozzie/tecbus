<?php

namespace App\Livewire;

use App\Models\BusStop;
use Livewire\Component;
use Livewire\WithPagination;

class BusstopComponent extends Component
{
    use WithPagination;

    //variable para buscar
    public $search;
    public $buscapor = "name";

    public $name;
    public $selectedBusstopId;
    public $showCreateModal = false;
    public $showEditModal = false;

    public function render()
    {

        $busstops = BusStop::where($this->buscapor,'like','%'.$this->search.'%')->paginate(10);
        return view('livewire.busstop-component', compact('busstops'));
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->showCreateModal = true;
    }

    public function closeCreateModal()
    {
        $this->showCreateModal = false;
    }

    public function edit($busstopid)
    {
        $this->resetForm();
        $this->showEditModal = true;
        $this->selectedBusstopId = $busstopid;

        $busstop = BusStop::find($busstopid);
        $this->name = $busstop ? $busstop->name : '';
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

        $this->resetForm();
        $this->showCreateModal = false;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required'
        ]);

        $busstop = BusStop::find($this->selectedBusstopId);

        if ($busstop) {
            $busstop->update([
                'name' => $this->name
            ]);

            $this->showEditModal = false;
        }
    }

    public function destroy($busstopid)
    {
        $busstop = BusStop::find($busstopid);

        if ($busstop) {
            $busstop->delete();
            session()->flash('message', 'Paradero eliminado correctamente.');
        } else {
            session()->flash('error', 'No se pudo encontrar el paradero.');
        }
    }

    private function resetForm()
    {
        $this->reset(['name', 'selectedBusstopId']);
    }
}
