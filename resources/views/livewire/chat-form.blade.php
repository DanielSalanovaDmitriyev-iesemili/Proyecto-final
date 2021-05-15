<div>
    <h1>Chat</h1>
    <div id="success" style="display:none; padding:4px; position: absolute; top:0; right:0; background: green;">
        Se ha enviado mensaje
    </div>
    <div>
        <div>Has entrado a la sala como: {{$name}}</div>
        <label for="message">{{__('Message')}}
            <input type="text" id="message" wire:model="message">
        </label>
        <div>{{$message}}</div>

        <button wire:click="sendMessage">{{__('Send')}}</button>
    </div>
    <script>
        window.livewire.on('messageSent', function () {
            document.getElementById('success').style.display = 'block';
            $('#success').fadeIn('slow');
            setTimeout(function(){document.getElementById('success').style.display = 'none';}, 3000)
        })
    </script>
</div>
