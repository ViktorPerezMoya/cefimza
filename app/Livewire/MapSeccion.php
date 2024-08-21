<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Parametro;

class MapSeccion extends Component
{
    public $lat;
    public $lng;

    public function mount(){
        $parametro = Parametro::where('tipo','mapa')->first();
        $latlng = explode(',',$parametro->link);
        $this->lat = $latlng[0];
        $this->lng = $latlng[1];
    }

    public function lat(){ return intval($this->lat);}
    public function lng(){ return intval($this->lng);}

    public function render()
    {
        return view('livewire.map-seccion');
    }
}
