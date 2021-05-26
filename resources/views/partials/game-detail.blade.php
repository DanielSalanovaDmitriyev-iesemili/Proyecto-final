@extends('layouts.index')
@section('content')
<div class="col-md-3">
    <h1>{{ $game->name}}</h1>
    <p>{{$game->description}}</p>
    <img src="{{$game->img}}" alt="dsad">
    <div>
        <label>{{$game->pegi}} | {{$game->price}} | {{$game->state}}</label>
        <label>{{$game->published}}</label>
        <div>
            @foreach ($game->plataforms()->get() as $plataform)
                {{$plataform->name}}
            @endforeach
        </div>
        <div>
            @foreach ($game->categories()->get() as $category)
                {{$category->name}}
            @endforeach
        </div>
    </div>
    <div>
        @if (Auth::check())
            <div class="nav-item">
                <a href="{{route('payments.index', [$game->id, Auth::user()->id])}}">Comprar</a>
            </div>
        @endif
        <div>
            Logueate para comprar!
        </div>
    </div>
    <div>
        <h1>Comentarios!</h1>
        <form action="{{route('comment.store', $game->id)}}" method="POST">
            @csrf
            <textarea id="" cols="30" rows="10" name="message"></textarea>
            <button type="submit">Comentar</button>
        </form>
        <div>
            @foreach ($comments as $comment)
                <div>
                    <label>{{$comment->user_name}}: {{$comment->message}}</label>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
