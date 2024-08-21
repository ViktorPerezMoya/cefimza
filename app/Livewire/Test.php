<?php

namespace App\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $valor1 = 0;
    public $valor2 = 0;
    public function sumar(){
        dd($this->valor1 + $this->valor2);
    }
    public function render()
    {
        return view('livewire.test');
    }
}
