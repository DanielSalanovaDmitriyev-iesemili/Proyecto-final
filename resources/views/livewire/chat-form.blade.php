<div>


    <div class="flex flex-row w-full">
        <div class="flex flex-row w-full bg-purple-400 text-purple-50 p-4 rounded-md">
            {{__('You have entered as')}}: {{$name}}
        </div>

        <label style="display:none;" for="receiver_id">{{__('Receiver')}}
            <input type="number" id="receiver_id" wire:model="receiver_id" name="receiver_id" value="{{$receiver_id}}">
        </label>
    </div>
    <div id="success"  style="display:none; " class="p-4 flex flex-row w-full bg-green-600 text-white rounded-md">
       {{__('Message has been sent')}}
    </div>
    <div class="flex flex-row w-full justify-center">
        <div class="w-full">
            <label for="message" class="block text-sm font-medium text-gray-700 self-center">{{__('Message')}}</label>
            <textarea required id="message" wire:model="message" name="message" class="mt-1 border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-700 rounded-md"  cols="30" rows="5" placeholder="{{__('Leave a comment here')}}">{{old('message')}}</textarea>
            @if($errors->has('message'))
                <p class="text-danger">{{ $errors->first('message')}}</p>
            @endif
            <button class="p-3 mt-2 bg-green-400 text-green-50 hover:text-green-400 hover:bg-green-50" wire:click="sendMessage">{{__('Send')}}</button>
        </div>
    </div>
    {{-- <div>

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
    </div> --}}
    <script>
        window.livewire.on('messageSent', function () {
            document.getElementById('success').style.display = 'block';
            $('#success').fadeIn('slow');
            setTimeout(function(){document.getElementById('success').style.display = 'none';}, 3000)
        })
    </script>
</div>
