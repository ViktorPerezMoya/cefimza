<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use App\Models\Nota;

class NotasForm extends Component
{
    use WithFileUploads;

    public $titulo;

    public $autor;

    public $fecha;

    public $resumen;

    public $contenido;

    public $visible = false;

    public $imagen;

    public $seccion_id;



    public $id;
    public $changedImage = false;
    public $extension = '';
    public $adjuntos;
    public $limiteresumen = 255;

    public function mount($idseccion,$id = 0)
    {
        $this->id = $id;
        if($id >0 ){
            $nota = Nota::find($id);

            $this->titulo = $nota->titulo;
            $this->autor = $nota->autor;
            $this->fecha = $nota->fecha;
            $this->resumen = $nota->resumen;
            $this->contenido = $nota->contenido;
            $this->visible = $nota->visible == 1;
            $this->seccion_id = $nota->seccion_id;
            $this->imagen = $nota->imagen;

        }else $this->seccion_id = $idseccion;
    }

    public function rules()
    {
        if($this->id > 0) return [
            'titulo' => 'required|string|max:150',
            'autor' => 'required|string|max:150',
            'fecha' => 'required|date',
            'resumen' => 'required|max:255',
            'contenido' => 'string'
        ];
        else{
            $rules = [
                'titulo' => 'required|string|max:150',
                'autor' => 'required|string|max:150',
                'fecha' => 'required|date',
                'resumen' => 'required|max:255',
                'contenido' => 'string'
            ];
            if($this->imagen) $rules['imagen'] = 'dimensions:min_width=400,min_height=400,ratio=1/1';
            return $rules;
        }
    }

    public function changeImage(){
        $this->changedImage = true;
    }

    public function save()
    {
        $this->validate();

        $url = limpiarString($this->titulo);
        if($this->imagen && !is_string($this->imagen)){
            $newFileName = $url.'.'.$this->imagen->getClientOriginalExtension();
            $filename = Storage::disk('public_img')->putFileAs('notas',$this->imagen,htmlspecialchars($newFileName, ENT_QUOTES, 'UTF-8'));
        }

        if($this->id == 0) $nota = new Nota();
        else $nota = Nota::find($this->id);
        $nota->titulo = $this->titulo;
        $nota->url = $url;
        $nota->autor = $this->autor;
        $nota->fecha = $this->fecha;
        $nota->resumen = $this->resumen;
        $nota->contenido = $this->contenido;
        if(!empty($filename)) $nota->imagen = $filename;
        $nota->visible = $this->visible;
        $nota->seccion_id = $this->seccion_id;
        $nota->save();

        if($this->id == 0) session()->flash('message', 'Nota creada!');
        else session()->flash('message', 'Cambios guardados!');

        return redirect()->route('notas',$this->seccion_id);
    }

    public function render()
    {
        return view('livewire.admin.notas-form');
    }
}
