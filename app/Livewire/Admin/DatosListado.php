<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Dato;
use App\Models\Seccion;

class DatosListado extends Component
{

    public $seccion;

    public $datos;

    public function mount($idseccion){
        $this->seccion = Seccion::find($idseccion);
        $this->datos = Dato::where('seccion_id',$idseccion)->get();
    }

    public function delete($id){

        try {
            $dato = Dato::find($id);
            $dato->delete();

            session()->flash('message', 'Dato eliminado!');

            return redirect()->route('datos',$dato->seccion_id);
        } catch (\Throwable $th) {
            session()->flash('error_message', 'Error al intentar eliminar el dato.');
            return redirect()->route('datos',$dato->seccion_id);
        }
    }

    public function render()
    {
        return view('livewire.admin.datos-listado');
    }
}
