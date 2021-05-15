<div>
    <h1>{{__('Messages')}}</h1>
    @foreach ($messages as $message)
        <p>{{$message->name}}: {{$message->pivot->message}}</p>
    @endforeach
</div>
