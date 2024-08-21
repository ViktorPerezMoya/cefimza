<?php

namespace App\Livewire\Admin\Secciones;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Seccion;

#[Title('Secciones - CEFIMendoza')]
class SeccionesAbm extends Component
{
    public $secciones = [];

    public function mount()
    {
        $this->secciones = Seccion::all();
    }

    public function delete($id){

        try {
            $seccion = Seccion::find($id);
            $seccion->delete();

            session()->flash('message', 'Seccion eliminada!');

            return redirect()->route('secciones');
        } catch (\Throwable $th) {
            session()->flash('error_message', 'Error al intentar eliminar la seccion.');
            return redirect()->route('secciones');
        }
    }

    public function render()
    {
        return view('livewire.admin.secciones.secciones-abm');
    }
}
