<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsuariosAbm extends Component
{

    public $usuarios;

    public function mount(){
        $this->usuarios = User::where('username','!=',Auth::user()->username)->get();
    }

    public function delete($id){

        try {
            $parametro = User::find($id);
            $parametro->delete();

            session()->flash('message', 'Usuario eliminado!');

            return redirect()->route('usuarios');
        } catch (\Throwable $th) {
            session()->flash('error_message', 'Error al intentar eliminar el usuario.');
            return redirect()->route('usuarios');
        }
    }
    public function render()
    {
        return view('livewire.admin.usuarios-abm');
    }
}
