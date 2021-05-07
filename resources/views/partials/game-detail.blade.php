@extends('layouts.index')
@section('content')
<div class="col-md-3">
    <h1>{{ $game->name}}</h1>
    <p>{{$game->description}}</p>
    <img src="{{$game->img}}" alt="dsad">
    <div>
        <label>{{$game->pegi}} | {{$game->price}} | {{$game->state}}</label>
        <label>{{$game->published}}</label>
    </div>
    <div>
        <div class="nav-item">
            <a href="{{route('payments.index', [$game->id, Auth::user()->id])}}">Comprar</a>
        </div>
    </div>
</div>
@endsection
