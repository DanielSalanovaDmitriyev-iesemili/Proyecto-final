<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\User;
use Livewire\Component;

class ChatForm extends Component
{
    public $user_id;
    public $room_id;
    public $receiver_id;
    public $name = '';
    public $message = '';

    //Método que nos permitirá coger datos del request e inicializar
    // variables
    // Carga este método cuando se refresca la página
    public function mount(){


        $this->user_id = Auth::user()->id;
        $this->name = Auth::user()->name;
        if(Auth::user()->id == $this->receiver_id){
            $this->room_id = 2;
        }else{
            $this->room_id = 1;
        }
        $this->message = '';
    }
    public function render()
    {
        return view('livewire.chat-form');
    }

    public function updated($field){
        //Validamos en tiempo real
        $this->validateOnly($field, [
            "message" => "required|min:2|max:250"
        ]);
    }

    public function sendMessage(){
        // Guardaremos el mensaje en BD

        $this->emit("messageSent");
        $room = Room::where('id', $this->room_id)->first();
        $currentUser = Auth::user()->rol()->get('name');
        $currentRol = $currentUser[0]->name;
        if(Auth::user()->id == $this->receiver_id) {
            $room->users()->attach([$this->user_id => ['message' => $this->message]]);
        }else{
            if($currentRol == 'client') {
                $chatAdmin = User::where('rol_id', 3)->first();
                $room->users()->attach([$this->user_id => ['receiver_id' => $chatAdmin->id,'message' => $this->message]]);
            }
            if($currentRol == 'chat'){
                $room->users()->attach([$this->user_id => ['receiver_id' => $this->receiver_id, 'message' => $this->message]]);
            }
        }


        // Creamos un evento para vincularlo al componente de
        // ChatList, así una vez enviado el mensaje recargamos
        // la lista de mensajes
        $this->emit("messageReceived", $this->message);
        event(new \App\Events\SendMessage($this->message));
    }


}
