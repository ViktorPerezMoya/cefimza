<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Tarjeta;
use App\Models\Seccion;

class TarjetasListado extends Component
{

    public $seccion;

    public $tarjetas;

    public function mount($idseccion){
        $this->seccion = Seccion::find($idseccion);
        $this->tarjetas = Tarjeta::where('seccion_id',$idseccion)->get();
    }

    public function delete($id){

        try {
            $tarjeta = Tarjeta::find($id);
            $tarjeta->delete();

            session()->flash('message', 'Tarjeta eliminada!');

            return redirect()->route('tarjetas',$tarjeta->seccion_id);
        } catch (\Throwable $th) {
            session()->flash('error_message', 'Error al intentar eliminar la tarjeta.');
            return redirect()->route('tarjetas',$tarjeta->seccion_id);
        }
    }

    public function render()
    {
        return view('livewire.admin.tarjetas-listado');
    }
}
