@extends('layouts.index')

@section('content')
@include('partials.filter')
<style>
    .comment-detail {
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
@if (Session::has('comment-detail'))
<p class="comment-detail absolute top-0 right-0 bg-green-600 text-white p-2 rounded-md">{{Session::get('comment-detail')}}</p>
@endif
<div class="flex flex-col">
    <div class="grid grid-rows-2">
        <div class="row-span-1">
            <div class='max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6'>
                <div class='flex flex-col md:flex-row -mx-4'>
                  <div class='md:flex-1 px-4'>
                    <div x-data='{ image: 1 }' x-cloak>
                      <div class='h-64 md:h-80 rounded-lg bg-gray-100 mb-4'>
                        <img src="{{asset($game->img)}}" class='h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center'/>
                      </div>


                    </div>
                  </div>
                  <div class='md:flex-1 px-4'>
                    <h2 class='mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl'>{{ $game->name}}</h2>
                    <p class='text-gray-500 text-sm'>By <a href='#' class='text-indigo-600 hover:underline'>2LifeGames</a></p>

                    <div class='flex items-center space-x-4 my-4'>
                      <div>
                        <div class='rounded-lg bg-gray-100 flex py-2 px-3'>

                          <span class='font-bold text-indigo-600 text-3xl'>{{$game->price}}$</span>
                        </div>
                      </div>
                    </div>
                    <p class='text-gray-500'>{{$game->description}}</p>
                    @if (Auth::check())
                    <div class='flex py-4 space-x-4'>
                        <a href="{{route('payments.index', [$game->id, Auth::user()->id])}}" class='h-14 px-6 py-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white'>
                         {{__('Buy')}}
                        </a>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
              <div class="ml-7">
                    <h1 class="text-xl">{{__('Genres')}}:</h1>
                    <div class="flex flex-row">
                        @foreach ($game->categories()->get() as $category)
                            <a  href="{{route('games.category', $category->id)}}" class="p-2 bg-indigo-400 rounded-xl mr-2">  {{$category->name}}</a>
                        @endforeach
                    </div>
              </div>
              <div class="mt-6 ml-7">
                <h1 class="text-xl">{{__('Plataforms')}}:</h1>
                <div class="flex flex-row">
                    @foreach ($game->plataforms()->get() as $plataform)
                        <a href="{{route('games.plataform', $plataform->id)}}" class="p-2 bg-indigo-400 rounded-xl mr-2">  {{$plataform->name}}</a>
                    @endforeach
                </div>
          </div>

        </div>
        <div class="row-span-1">
            <div class="flex mx-auto items-center justify-center shadow-lg mt-24 mx-8 mb-4 max-w-lg">
                <form action="{{route('comment.store', $game->id)}}" method="POST" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
                   @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">{{__('Add a new comment')}}</h2>
                      <div class="w-full md:w-full px-3 mb-2 mt-2">
                         <textarea name="message" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder='{{__('Type Your Comment')}}' required></textarea>
                      </div>
                      <div class="w-full md:w-full flex items-start md:w-full px-3">
                         <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">


                         </div>
                         <div class="-mr-1">
                             @if (Auth::check())
                                 <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='{{__('Send Comment')}}'>
                                 @else
                                 <input class="bg-purple-500 text-white font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 " value='{{__('Sign up to comment')}}'>
                             @endif

                         </div>
                      </div>
                   </form>
                </div>
             </div>


        </div>
    </div>

    <div class="ml-20 flex flex-col">
            <h1 class="text-3xl mb-4">{{__('Comments')}}</h1>
            @foreach ($comments as $comment)
                <div class="mb-4">
                    <div class="flex flex-row mb-3">
                        <div class="mr-5 bg-gray-50 w-1/5">{{$comment->user_name}}</div>
                        <div class="bg-gray-100 w-3/5">{{$comment->message}}</div>
                        <div class="bg-gray-200 w-1/5">{{__('Date')}}: {{$comment->created_at}}</div>
                    </div>
                </div>
                 @endforeach
    </div>


</div>


@endsection
