<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Dato;

class DatosForm extends Component
{
    #[Validate('required|min:3|max:50')]
    public $detalle;

    #[Validate('required|min:3|max:50')]
    public $valor;

    #[Validate('max:255')]
    public $link;

    #[Validate('required|min:3|max:50')]
    public $icono;

    public $seccion_id;

    public $id;

    public function mount($idseccion,$id = 0){

        $this->id = $id;
        if($id > 0 ){
            $dato = Dato::find($id);

            $this->detalle = $dato->detalle;
            $this->valor = $dato->valor;
            $this->link = $dato->link;
            $this->icono = $dato->icono;
            $this->seccion_id = $dato->seccion_id;

        }else $this->seccion_id = $idseccion;
    }

    public function save(){
        $this->validate();

        if($this->id == 0) $dato = new Dato();
        else $dato = Dato::find($this->id);
        $dato->detalle = $this->detalle;
        $dato->valor = $this->valor;
        $dato->link = $this->link;
        $dato->icono = $this->icono;
        $dato->seccion_id = $this->seccion_id;
        $dato->save();

        if($this->id == 0) session()->flash('message', 'Dato creado!');
        else session()->flash('message', 'Cambios guardados!');

        return redirect()->route('datos',$this->seccion_id);
    }

    public function render()
    {
        return view('livewire.admin.datos-form');
    }
}
