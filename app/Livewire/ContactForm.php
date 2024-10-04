<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactoEmail;

class ContactForm extends Component
{

    #[Validate('required|string|min:3|max:50')]
    public $nombre;
    #[Validate('required|email|max:150')]
    public $email;
    #[Validate('required|min:3|max:20')]
    public $telefono;
    #[Validate('required')]
    public $mensaje;


    public $errorMessage;
    public $succesMessage;

    public function mount(){
        $this->succesMessage = "";
        $this->errorMessage = "";
    }

    public function enviar(){
        $this->validate();
        try {
            Mail::to(env('MAIL_CONTACT_ADDRESS'))->send(new ContactoEmail([
                'nombre' => $this->nombre,
                'email' => $this->email,
                'telefono' => $this->telefono,
                'mensaje' => $this->mensaje
            ]));

            $this->nombre = "";
            $this->email = "";
            $this->telefono = "";
            $this->mensaje = "";
            $this->succesMessage = "Correo Enviado";

        } catch (\Throwable $th) {
            $this->errorMessage = "No se pudo enviar el mensaje.";
            Log::error($th->getMessage());
            //dd($th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
