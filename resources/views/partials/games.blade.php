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
    @if (Request::is('es/juegos/categoria/*') || Request::is('en/games/category/*'))
      <div class=" mb-3 p-2 bg-gray-100 flex flex-row md:flex-col align-middle justify-center">
            @if (isset($currentCategory) && $currentCategory)
                <div class="col-span-3 w-100 h-100">
                    <img src="{{asset($currentCategory->img)}}" alt="" class=" object-bottom w-full h-48 my-6">
                </div>
                <div class="col-span-1 text-center">
                    <h4 class="text-2xl">{{$currentCategory->name}}</h4>
                     {{$currentCategory->description}}
                </div>
        @endif
    </div>

    @endif
    <div class="grid grid-cols-3 gap-6">
        @foreach ($games as $game)
        <div class="max-w-xs rounded overflow-hidden shadow-lg my-2">
            <img class="w-full h-44" style="width: 100% \9;" src="{{asset($game->img)}}" >
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



