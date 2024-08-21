<?php

namespace App\Livewire\Admin\Secciones;

use Livewire\Component;
use App\Models\Seccion;

class VistaPrevia extends Component
{
    public $seccion;

    public function mount($id){
        $this->seccion = Seccion::find($id);
    }

    public function render()
    {
        return view('livewire.admin.secciones.vista-previa');
    }
}
