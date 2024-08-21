<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Nota;
use App\Models\Seccion;

class NotasListado extends Component
{

    public $seccion;

    public $notas;

    public function mount($idseccion){
        $this->seccion = Seccion::find($idseccion);
        $this->notas = Nota::where('seccion_id',$idseccion)->get();
    }

    public function delete($id){

        try {
            $nota = Nota::find($id);
            $nota->delete();

            session()->flash('message', 'Nota eliminada!');

            return redirect()->route('notas',$nota->seccion_id);
        } catch (\Throwable $th) {
            session()->flash('error_message', 'Error al intentar eliminar la nota.');
            return redirect()->route('notas',$nota->seccion_id);
        }
    }

    public function render()
    {
        return view('livewire.admin.notas-listado');
    }
}
