<div>
    <h1>{{__('Messages')}}</h1>
    <label style="display:none;" for="receiver_id">{{__('Receiver')}}
        <input type="number" id="receiver_id" wire:model="receiver_id" name="receiver_id" value="{{$receiver_id}}">
    </label>
    @foreach ($messages as $message)
        <p>{{$message->name}}: {{$message->pivot->message}}</p>
    @endforeach
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('d4a9f57fea6b4e251a41', {
          cluster: 'eu'
        });

        var channel = pusher.subscribe('chat-channel');
        channel.bind('chat-event', function(data) {
            //alert(JSON.stringify(data));
            window.livewire.emit('messageReceived', data);
        });
      </script>
</div>
