<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Room;

class ChatList extends Component
{
    public $messages;
    protected $listeners = ['messageReceived'];

    public function mount()  {
        $this->messages = [];
    }
    public function render()
    {
        return view('livewire.chat-list');
    }

    public function messageReceived ($message) {
        // Haremos una select con los mensajes de dicha sala
        $messages = Room::first();
        $this->messages = $messages->users()->get();

    }
}
