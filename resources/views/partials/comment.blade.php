@extends('layouts.index')
@section('content')

<div>
    <div class="table p-2" style="width: 118%">
        @include('partials.admin-menu')
    </div>
    <div class="container mt-4 mx-auto">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($comments as $comment)

                <div class="card m-2 cursor-pointer border border-gray-400 rounded-lg hover:shadow-md hover:border-opacity-0 transform hover:-translate-y-1 transition-all duration-200">
                    <div class="m-3">
                   <h2 class="text-lg mb-2">{{$comment->game()->get('name')[0]->name}}
                   <span class="text-sm text-teal-800 font-mono bg-teal-100 inline rounded-full px-2 align-top float-right animate-pulse">{{$comment->user_name}}</span></h2>
                   <p class="font-light font-mono text-sm text-gray-700 hover:text-gray-900 transition-all duration-200">{{$comment->message}}</p>
                    <div>

                        <p class="float-left">{{__('Created At')}}: {{$comment->created_at}}</p>
                        <button type="button" onclick="openModal('{{$comment->id}}')" class="bg-red-500 text-red-50 rounded-lg p-1 float-right hover:text-red-500 hover:bg-red-50">{{__('Delete')}}</button>


                    </div>

                 </div>
                 <table>
                    <dialog id="{{$comment->id}}" class="bg-transparent z-0 relative w-screen h-screen">
                        <div class="p-7 flex justify-center items-center fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 opacity-0">
                            <div class="bg-white flex rounded-lg  relative">
                                <div class="flex flex-col justify-center">
                                    <div class="p-7 flex items-center w-full">
                                        <div class="text-gray-900 font-bold text-lg">{{__('Delete Comment')}} {{$comment->id}}</div>
                                        <svg onclick="modalClose('{{$comment->id}}')" class="ml-auto fill-current text-gray-700 w-5 h-5 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                                        </svg>
                                    </div>

                                    <div class="px-7 overflow-x-hidden overflow-y-auto" style="max-height: 40vh;">
                                        <p>{{__('Are you sure you want to delete it?')}}</p>
                                    </div>

                                    <div class="p-7 flex justify-end items-center w-full">

                                        <form action="{{route('comment.delete',$comment->id)}}" method="POST" >
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit"  class="bg-blue-500 p-2 text-white hover:shadow-lg font-bold py-2 px-4 rounded mr-3">OK</button>
                                        </form>

                                </div>
                            </div>
                        </div>
                    </dialog>
                </table>
                </div>

            @endforeach
        </div>
      </div>
</div>


@endsection
