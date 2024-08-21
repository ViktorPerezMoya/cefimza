<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

#[Title('Register - CEFIMendoza')]
class Register extends Component
{
    #[Validate('required|string|min:3|max:50')]
    public $username;

    #[Validate('required|email|max:150|unique:users,email')]
    public $email;

    #[Validate('required|string|min:8|confirmed')]
    public $password;

    public $password_confirmation;

    public function register()
    {
        $this->validate();

        User::create([
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $credentials = [
            'username' => $this->username,
            'password' => $this->password,
        ];

        Auth::attempt($credentials);

        session()->flash('message', 'Se ha registrado correctamente, bienvenido!');

        return $this->redirectRoute('dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
