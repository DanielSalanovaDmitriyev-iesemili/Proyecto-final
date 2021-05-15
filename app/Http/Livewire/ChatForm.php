<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use Livewire\Component;

class ChatForm extends Component
{
    public $user_id;
    public $room_id;
    public $name = '';
    public $message = '';

    //Método que nos permitirá coger datos del request e inicializar
    // variables
    // Carga este método cuando se refresca la página
    public function mount(){
        $this->user_id = Auth::user()->id;
        $this->name = Auth::user()->name;
        $this->room_id = 1;
        $this->message = '';
    }
    public function render()
    {
        return view('livewire.chat-form');
    }

    public function sendMessage(){
        // Guardaremos el mensaje en BD

        $this->emit("messageSent");
        $room = Room::first();
        $room->users()->attach([$this->user_id => ['message' => $this->message]]);
        // Creamos un evento para vincularlo al componente de
        // ChatList, así una vez enviado el mensaje recargamos
        // la lista de mensajes
        $this->emit("messageReceived", $this->message);
    }


}
