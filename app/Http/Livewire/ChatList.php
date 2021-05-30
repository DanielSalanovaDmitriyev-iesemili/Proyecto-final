<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatList extends Component
{
    public $messages;
    public $receiver_id;
    protected $listeners = ['messageReceived'];

    public function mount()  {
        //Inicializamos los mensajes de la primera sala
        $this->messages = [];
        if(Auth::user()->id == $this->receiver_id){
            $messages = Room::where('id',2)->first();
        }else{
            $messages = Room::where('id',1)->first();
        }

        //Chat publico
        if($this->receiver_id == Auth::user()->id){
            $this->messages = $messages->users()->wherePivotNull('receiver_id')->get();
        }else{
            //Cliente
            if(Auth::user()->rol_id == 2) {
                $chatAdmin = User::where('rol_id', 3)->first();
                $this->receiver_id = $chatAdmin->id;
                $this->messages = $messages->users()->wherePivot('receiver_id',Auth::user()->id)->orWherePivot('user_id',Auth::user()->id)->get();
            }
            //Admin chat
            else{
                $this->messages = $messages->users()->wherePivot('user_id', $this->receiver_id)->orWherePivot('receiver_id',$this->receiver_id)->get();
            }
        }

    }
    public function render()
    {
        return view('livewire.chat-list');
    }

    public function messageReceived ($message) {
        // Haremos una select con todos los mensajes de dicha sala

        //Chat publico
        if(Auth::user()->id == $this->receiver_id){
            $messages = Room::where('id',2)->first();
            $this->messages = $messages->users()->wherePivotNull('receiver_id')->get();
        }else{
            $messages = Room::where('id',1)->first();
            //Cliente
            if(Auth::user()->rol_id == 2) {
                $this->messages = $messages->users()->wherePivot('receiver_id',Auth::user()->id)->orWherePivot('user_id',Auth::user()->id)->get();
            }
            //Admin chat
            else{
                $this->messages = $messages->users()->wherePivot('user_id', $this->receiver_id)->orWherePivot('receiver_id',$this->receiver_id)->get();
            }
        }
    }
}
