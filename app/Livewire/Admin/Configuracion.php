<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class Configuracion extends Component
{
    public $username;

    public $email;

    public $password;

    public $password_confirmation;

    public $id;

    public function mount(){
        $this->id = Auth::user()->id;
        $usuario = User::find($this->id);

        $this->username = $usuario->username;
        $this->email = $usuario->email;
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function rules()
    {
        if(intval($this->id) > 0) return [
            'username' => 'required|string|min:3|max:50',
            'email' => 'required|email|max:150',
            'password' => 'string|min:8|confirmed'
        ];
        else{
            return [
            'username' => 'required|string|min:3|max:50',
            'email' => 'required|email|max:150|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ];
        }
    }

    public function save(){
        $this->validate();

        if($this->id == 0) $usuario = new User();
        else $usuario = User::find($this->id);
        $usuario->email = $this->email;
        if(strlen($this->password) > 0)
            $usuario->password = Hash::make($this->password);
        $usuario->save();

        if($this->id == 0) session()->flash('message', 'Usuario creado!');
        else session()->flash('message', 'Cambios guardados!');

        return redirect()->route('configuracion');
    }

    public function render()
    {
        return view('livewire.admin.configuracion');
    }
}
