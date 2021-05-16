<div>
    <h1>Chat</h1>
    <div id="success" style="display:none; padding:4px; position: absolute; top:0; right:0; background: green;">
        Se ha enviado mensaje
    </div>
    <div>
        {{-- @props(['receiver_id']) --}}
        <label style="display:none;" for="receiver_id">{{__('Receiver')}}
            <input type="number" id="receiver_id" wire:model="receiver_id" name="receiver_id" value="{{$receiver_id}}">
        </label>
        <div>Has entrado a la sala como: {{$name}}</div>
        <label for="message">{{__('Message')}}
            <input type="text" id="message" wire:model="message" name="message">
        </label>
        <button wire:click="sendMessage">{{__('Send')}}</button>
        @if($errors->has('message'))
            <p class="text-danger" style="color:red;">{{ $errors->first('message')}}</p>
        @endif
    </div>
    <script>
        window.livewire.on('messageSent', function () {
            document.getElementById('success').style.display = 'block';
            $('#success').fadeIn('slow');
            setTimeout(function(){document.getElementById('success').style.display = 'none';}, 3000)
        })
    </script>
</div>
