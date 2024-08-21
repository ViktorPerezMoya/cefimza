<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

use App\Models\Tarjeta;

class TarjetasForm extends Component
{
    use WithFileUploads;

    public $titulo;

    public $detalle;

    public $imagen;

    //#[Validate('required|min:3')]
    public $link;

    public $label_link;

    public $seccion_id;

    public $changedImage = false;
    public $extension = '';
    public $id;
    public $limiteDetalle = 255;

    public function mount($idseccion,$id = 0){

        $this->id = $id;
        if($id > 0 ){
            $tarjeta = Tarjeta::find($id);

            $this->titulo = $tarjeta->titulo;
            $this->detalle = $tarjeta->detalle;
            $this->link = $tarjeta->link;
            $this->label_link = $tarjeta->label_link;
            $this->seccion_id = $tarjeta->seccion_id;
            $this->imagen = $tarjeta->imagen;

        }else $this->seccion_id = $idseccion;

    }

    public function changeImage(){
        $this->changedImage = true;
    }

    public function rules()
    {
        if($this->id > 0) return [
            'titulo' => 'required|min:3|max:50',
            'detalle' => 'required|min:3|max:255',
            'label_link' => 'max:20'
        ];
        else{
            $rules = [
                'titulo' => 'required|min:3|max:50',
                'detalle' => 'required|min:3|max:255',
                'label_link' => 'max:20'
            ];
            if($this->imagen) $rules['imagen'] = 'required|dimensions:min_width=500,min_height=500|mimes:jpeg,png,jpg|max:2048';
            return $rules;
        }
    }

    public function save(){
        $this->validate();

        if($this->imagen && !is_string($this->imagen)){
            $newFileName = limpiarString($this->titulo).'.'.$this->imagen->getClientOriginalExtension();
            $filename = Storage::disk('public_img')->putFileAs('tarjetas',$this->imagen,$newFileName);
        }

        if($this->id == 0) $tarjeta = new Tarjeta();
        else $tarjeta = Tarjeta::find($this->id);
        $tarjeta->titulo = $this->titulo;
        $tarjeta->detalle = $this->detalle;
        if(!empty($filename)) $tarjeta->imagen = $filename;
        $tarjeta->link = $this->link;
        $tarjeta->label_link = $this->label_link;
        $tarjeta->seccion_id = $this->seccion_id;
        $tarjeta->save();

        if($this->id == 0) session()->flash('message', 'Tarjeta creada!');
        else session()->flash('message', 'Cambios guardados!');

        return redirect()->route('tarjetas',$this->seccion_id);
    }

    public function render()
    {
        return view('livewire.admin.tarjetas-form');
    }
}
