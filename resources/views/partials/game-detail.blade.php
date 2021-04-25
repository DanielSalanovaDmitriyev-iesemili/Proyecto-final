@extends('layouts.index')
@section('content')
<div class="col-md-3">
    <h1>{{ $game->name}}</h1>
    <img src="{{$game->img}}" alt="dsad">
    <div>
        <label>{{$game->pegi}} | {{$game->price}} | {{$game->state}}</label>
        <label>{{$game->published}}</label>
    </div>
</div>
@endsection
