<?php

namespace App\Livewire\Admin\Secciones;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use App\Models\Seccion;

class FormSeccion extends Component
{
    use WithFileUploads;

    public $titulo;

    public $subtitulo;

    public $contenido = '';

    public $imagen;

    public $in_menu = false;

    public $in_home = false;

    public $visible = false;

    public $link;

    public $tipo;

    public $orden_home;

    public $orden_menu;


    public $id;
    public $changedImage = false;
    public $extension = '';
    public $maxOrdenHome = 0;
    public $maxOrdenMenu = 0;

    public function mount($id = 0)
    {
        $this->id = $id;
        $this->maxOrdenHome = Seccion::max('orden_home');
        $this->maxOrdenMenu = Seccion::max('orden_menu');
        if($id >0 ){
            $seccion = Seccion::find($id);

            $this->titulo = $seccion->titulo;
            $this->subtitulo = $seccion->subtitulo;
            $this->contenido = $seccion->contenido;
            $this->in_menu = $seccion->in_menu == 1;
            $this->in_home = $seccion->in_home == 1;
            $this->visible = $seccion->visible == 1;
            $this->link = $seccion->link;
            $this->tipo = $seccion->tipo;
            $this->orden_home = $seccion->orden_home;
            $this->orden_menu = $seccion->orden_menu;
            $this->imagen = $seccion->imagen;
        }
    }

    public function rules()
    {
        if($this->id > 0) return [
            'titulo' => 'required|string|max:60',
            'subtitulo' => 'max:150',
            'tipo' => 'required|string',
            'orden_home' => 'required',
            'orden_menu' => 'required',
            'contenido' => 'string',
        ];
        else{
            $rules = [
                'titulo' => 'required|string|max:60',
                'subtitulo' => 'max:150',
                'tipo' => 'required|string',
                'orden_home' => 'required',
                'orden_menu' => 'required',
                'contenido' => 'string'
            ];
            if($this->imagen) $rules['imagen'] = 'dimensions:min_width=500,min_height=500';
            return $rules;
        }
    }

    public function changeImage(){
        $this->changedImage = true;
    }

    public function save()
    {
        $this->validate();

        if($this->imagen && !is_string($this->imagen)){
            $newFileName = limpiarString($this->titulo).'.'.$this->imagen->getClientOriginalExtension();
            $filename = Storage::disk('public_img')->putFileAs('seccion',$this->imagen,$newFileName);
        }

        if($this->id == 0) $seccion = new Seccion();
        else $seccion = Seccion::find($this->id);
        $seccion->titulo = $this->titulo;
        $seccion->subtitulo = $this->subtitulo;
        $seccion->contenido = $this->contenido;
        if(!empty($filename)) $seccion->imagen = $filename;
        $seccion->in_menu = $this->in_menu;
        $seccion->in_home = $this->in_home;
        $seccion->visible = $this->visible;
        $seccion->link = $this->link;
        $seccion->tipo = $this->tipo;
        $seccion->orden_home = $this->in_home ? $this->orden_home : 0;
        $seccion->orden_menu = $this->in_menu ? $this->orden_menu : 0;
        $seccion->save();

        if($this->id == 0) session()->flash('message', 'Seccion creada!');
        else session()->flash('message', 'Cambios guardados!');

        return redirect()->route('secciones');
    }

    public function render()
    {
        return view('livewire.admin.secciones.form-seccion');
    }
}
