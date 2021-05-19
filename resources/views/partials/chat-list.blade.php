@foreach ($users as $user)
    <div>
        @if (Auth::user()->rol_id == 3)
            <h1>Chat {{$user}}</h1>
            <button><a href="{{route('chat.index', $user)}}">Entrar Sala</a></button>
            @else
                <h1>Admin Chat</h1>
                <button><a href="{{route('chat.index', $user)}}">Entrar Sala</a></button>
        @endif
    </div>
@endforeach
