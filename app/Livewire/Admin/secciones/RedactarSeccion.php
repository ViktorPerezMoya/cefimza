<?php

namespace App\Livewire\Admin\Secciones;

use Livewire\Component;

use App\Models\Seccion;

class RedactarSeccion extends Component
{
    public $contenido;

    public $seccion;

    public function mount($id){
        $this->seccion = Seccion::find($id);
        $this->contenido = $this->seccion->contenido?? '';
    }


    public function save(){
        $this->seccion->contenido = $this->contenido;
        $this->seccion->save();

        session()->flash('message', 'Cambios guardados!');

        return redirect()->route('secciones');
    }

    public function render()
    {
        return view('livewire.admin.secciones.redactar-seccion');
    }
}
