<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

use App\Models\Integrante;

class IntegranteForm extends Component
{
    use WithFileUploads;

    public $nombre;

    public $puesto;

    public $imagen;

    public $twitter;

    public $facebook;

    public $linkedin;

    public $changedImage = false;
    public $extension = '';
    public $id;

    public function mount($idseccion,$id = 0){

        $this->id = $id;
        if($id > 0 ){
            $integrante = Integrante::find($id);

            $this->nombre = $integrante->nombre;
            $this->puesto = $integrante->puesto;
            $this->twitter = $integrante->twitter;
            $this->facebook = $integrante->facebook;
            $this->linkedin = $integrante->linkedin;
            $this->imagen = $integrante->imagen;
        }

    }

    public function changeImage(){
        $this->changedImage = true;
    }

    public function rules()
    {
        if($this->id > 0) return [
            'nombre' => 'required|min:3|max:50',
            'puesto' => 'required|min:3|max:100',
        ];
        else{
            $rules = [
                'nombre' => 'required|min:3|max:50',
                'puesto' => 'required|min:3|max:100',
            ];
            if($this->imagen) $rules['imagen'] = 'required|dimensions:min_width=200,min_height=200,ratio=1/1:|mimes:jpeg,png,jpg|max:2048';
            return $rules;
        }
    }

    public function save(){
        $this->validate();

        if($this->imagen && !is_string($this->imagen)){
            $newFileName = limpiarString($this->nombre).'.'.$this->imagen->getClientOriginalExtension();
            $filename = Storage::disk('public_img')->putFileAs('equipo',$this->imagen,$newFileName);
        }

        if($this->id == 0) $integrante = new Integrante();
        else $integrante = Integrante::find($this->id);
        $integrante->nombre = $this->nombre;
        $integrante->puesto = $this->puesto;
        $integrante->twitter = $this->twitter;
        $integrante->facebook = $this->facebook;
        $integrante->linkedin = $this->linkedin;
        if(!empty($filename)) $integrante->imagen = $filename;
        $integrante->save();

        if($this->id == 0) session()->flash('message', 'Integrante creado!');
        else session()->flash('message', 'Cambios guardados!');

        return redirect()->route('equipo');
    }

    public function render()
    {
        return view('livewire.admin.integrante-form');
    }
}
