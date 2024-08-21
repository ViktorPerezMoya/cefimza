<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Integrante;
use Illuminate\Support\Facades\Storage;

#[Title('Equipo - CEFIMendoza')]
class EquipoAbm extends Component
{
    public $integrantes = [];

    public function mount()
    {
        $this->integrantes = Integrante::all();
    }

    public function delete($id){

        try {
            $integrante = Integrante::find($id);
            $integrante->delete();

            session()->flash('message', 'Integrante eliminado!');

            return redirect()->route('equipo');
        } catch (\Throwable $th) {
            session()->flash('error_message', 'Error al intentar eliminar el integrante.');
            return redirect()->route('equipo');
        }
    }

    public function render()
    {
        return view('livewire.admin.equipo-abm');
    }
}
