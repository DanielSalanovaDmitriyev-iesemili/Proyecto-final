@extends('layouts.index')
@section('content')
<div>
    @if (Auth::user()->rol_id == 3)
         @foreach ($users as $user)
         <div class="card m-2 w-full cursor-pointer flex flex-row border border-gray-400 rounded-lg hover:shadow-md hover:border-opacity-0 transform hover:-translate-y-1 transition-all duration-200">
            <div class="m-3">
             <h2 class="text-lg mb-2">Chat {{$user}}
             {{-- <span class="text-sm text-teal-800 font-mono bg-teal-100 inline rounded-full px-2 align-top float-right animate-pulse">{{$comment->user_name}}</span></h2> --}}
              <div>
                <a  href="{{route('chat.index',$user)}}" class="bg-purple-500 text-purple-50 rounded-lg mt-1 p-1 float-left hover:text-purple-500 hover:bg-purple-50">unirse</a>
              </div>
           </div>
          </div>
        @endforeach

        @else
        <div class="card m-2 w-full cursor-pointer border border-gray-400 rounded-lg hover:shadow-md hover:border-opacity-0 transform hover:-translate-y-1 transition-all duration-200">
            <div class="m-3">
             <h2 class="text-lg mb-2">{{__('Admin Chat')}}
             {{-- <span class="text-sm text-teal-800 font-mono bg-teal-100 inline rounded-full px-2 align-top float-right animate-pulse">{{$comment->user_name}}</span></h2> --}}
              <div>
                <a  href="{{route('chat.index',7)}}" class="bg-purple-500 text-purple-50 rounded-lg p-1 mt-1 float-left hover:text-purple-500 hover:bg-purple-50">unirse</a>
              </div>
           </div>
          </div>
    @endif
    <div class="card m-2 w-full cursor-pointer border border-gray-400 rounded-lg hover:shadow-md hover:border-opacity-0 transform hover:-translate-y-1 transition-all duration-200">
        <div class="m-3">
         <h2 class="text-lg mb-2">{{__('Public Chat')}}
         {{-- <span class="text-sm text-teal-800 font-mono bg-teal-100 inline rounded-full px-2 align-top float-right animate-pulse">{{$comment->user_name}}</span></h2> --}}
          <div>
            <a  href="{{route('chat.index', Auth::user()->id)}}" class="bg-purple-500 text-purple-50 rounded-lg p-1 mt-1 float-left hover:text-purple-500 hover:bg-purple-50">unirse</a>
          </div>
       </div>
      </div>
</div>

@endsection
