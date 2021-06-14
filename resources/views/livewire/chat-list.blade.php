<div>
    <label style="display:none;" for="receiver_id">{{__('Receiver')}}
        <input type="number" id="receiver_id" wire:model="receiver_id" name="receiver_id" value="{{$receiver_id}}">
    </label>
    <div class="w-full">
        <div id="chat" class="w-full overflow-y-auto p-10 relative" style="height: 700px;" ref="toolbarChat">
            <ul>
                <li class="clearfix2">
                    @foreach ($messages as $message)
                        @if($message->id != Auth::user()->id)
                            <div class="w-full flex justify-start">
                                <div class="bg-gray-700 rounded px-5 py-2 my-2 text-white relative" style="max-width: 300px;">
                                    <span class="block text-xs">{{$message->name}}</span>
                                    <span class="block  text-right">{{$message->pivot->message}}</span>
                                </div>
                            </div>

                        @else
                        <div class="w-full flex justify-end">
                            <div class="bg-green-700 rounded px-5 py-2 my-2 text-white relative" style="max-width: 300px;">
                                <span class="block text-xs">{{$message->name}}</span>
                                <span class="block text-right">{{$message->pivot->message}}</span>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
</div>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('d4a9f57fea6b4e251a41', {
          cluster: 'eu'
        });

        var channel = pusher.subscribe('chat-channel');
        channel.bind('chat-event', function(data) {
            window.livewire.emit('messageReceived', data);
        });
      </script>
</div>
