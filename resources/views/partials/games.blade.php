@extends('layouts.index')
@section('content')
    @foreach ($games as $game)
        <div class="col-md-3">
            <h1><a href="{{route('games.show', $game->id)}}">{{ $game->name}}</a></h1>
            <img src="{{$game->img}}" alt="dsad">
            <div>
                <label>{{$game->pegi}} | {{$game->price}} | {{__($game->state)}}</label>
                <label>{{$game->published}}</label>
            </div>
        </div>
    @endforeach
    {{ $games->links() }}
@endsection


