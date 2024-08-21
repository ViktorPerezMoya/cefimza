<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Parametro;

class ParametrosForm extends Component
{
    #[Validate('max:50')]
    public $detalle;

    #[Validate('required|min:3|max:50')]
    public $tipo;

    #[Validate('max:255')]
    public $link;

    #[Validate('max:50')]
    public $icono;

    public $id;

    public function mount($id = 0){

        $this->id = $id;
        if($id > 0 ){
            $parametro = Parametro::find($id);

            $this->detalle = $parametro->detalle;
            $this->tipo = $parametro->tipo;
            $this->link = $parametro->link;
            $this->icono = $parametro->icono;

        }
    }

    public function save(){
        $this->validate();

        if($this->id == 0) $parametro = new Parametro();
        else $parametro = Parametro::find($this->id);
        $parametro->detalle = $this->detalle;
        $parametro->tipo = $this->tipo;
        $parametro->link = $this->link;
        $parametro->icono = $this->icono;
        $parametro->save();

        if($this->id == 0) session()->flash('message', 'Parametro creado!');
        else session()->flash('message', 'Cambios guardados!');

        return redirect()->route('parametros');
    }

    public function render()
    {
        return view('livewire.admin.parametros-form');
    }
}
