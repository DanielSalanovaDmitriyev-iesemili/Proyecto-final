@extends('layouts.index')

@section('content')
<style>
    .payment {
  -webkit-animation: seconds 1.0s forwards;
  -webkit-animation-iteration-count: 1;
  -webkit-animation-delay: 5s;
  animation: seconds 1.0s forwards;
  animation-iteration-count: 1;
  animation-delay: 5s;
  position: absolute;
  top: 0;
  right: 0

}
@-webkit-keyframes seconds {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    left: -9999px;
  }
}
@keyframes seconds {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    left: -9999px;
  }
}
</style>
@include('partials.filter')
@if (Session::has('payment'))
<p class="payment absolute top-0 right-0 bg-green-600 text-white p-2 rounded-md">{{Session::get('payment')}}</p>
@endif

<div class="w-full p-6">
    <h1 class="text-4xl font-bold mb-10">{{__('Games')}}</h1>
    <div class="grid grid-cols-3 gap-6">
        @foreach ($games as $game)
        <div class="max-w-xs rounded overflow-hidden shadow-lg my-2">
            <img class="w-full" src="{{asset('img/01.jpg')}}" >
            <div class="px-6 py-4">
              <div class="font-bold text-xl mb-2"><a href="{{route('games.show', $game->id)}}">{{ $game->name}}</a></div>
            </div>
            <div class="px-6 py-4">
              <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">Pegi:{{$game->pegi}}</span>
              <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">{{$game->price}}$</span>
              <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">{{__($game->state)}}</span>
            </div>
        </div>
        @endforeach
    </div>
    {{ $games->links() }}
</div>
@endsection



