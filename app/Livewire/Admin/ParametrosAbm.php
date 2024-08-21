<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Parametro;

class ParametrosAbm extends Component
{

    public $parametros;

    public function mount(){
        $this->parametros = Parametro::all();
    }

    public function delete($id){

        try {
            $parametro = Parametro::find($id);
            $parametro->delete();

            session()->flash('message', 'Parametro eliminado!');

            return redirect()->route('parametros');
        } catch (\Throwable $th) {
            session()->flash('error_message', 'Error al intentar eliminar el parametro.');
            return redirect()->route('parametros');
        }
    }

    public function render()
    {
        return view('livewire.admin.parametros-abm');
    }
}
