@extends('layouts.admin')
@section('content')
<div class="table w-full p-2">
    <table class="w-full border">
        @include('partials.admin-menu')
        <thead>
            <tr class="bg-gray-50 border-b">

                <th class="p-2 border-r  text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        ID
                    </div>
                </th>
                <th class="p-2 border-r  text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        {{__('Name')}}
                    </div>
                </th>
                <th class="p-2 border-r  text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        {{__('Edit')}}
                    </div>
                </th>

                 <th class="p-2 border-r border-l text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        {{__('Delete')}}
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <!-- Datos -->
            @foreach ($plataforms as $plataform)
            <dialog id="{{$plataform->id}}" class="bg-transparent z-0 relative w-screen h-screen">
                <div class="p-7 flex justify-center items-center fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 opacity-0">
                    <div class="bg-white flex rounded-lg  relative">
                        <div class="flex flex-col justify-center">
                            <div class="p-7 flex items-center w-full">
                                <div class="text-gray-900 font-bold text-lg">{{__('Delete')}} {{$plataform->name}}</div>
                                <svg onclick="modalClose('{{$plataform->id}}')" class="ml-auto fill-current text-gray-700 w-5 h-5 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                                </svg>
                            </div>

                            <div class="px-7 overflow-x-hidden overflow-y-auto" style="max-height: 40vh;">
                                <p>{{__('Are you sure you want to delete it?')}}</p>
                            </div>

                            <div class="p-7 flex justify-end items-center w-full">
                                {{-- <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3">
                                    Ok
                                </button> --}}
                                <form action="{{route('plataforms.delete',$plataform->id)}}" method="POST" class="py-2 px4 mr-3">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit"  class="bg-blue-500 p-2 text-white hover:shadow-lg font-bold py-2 px-4 rounded mr-3">OK</button>
                                </form>
                                {{-- <button type="button" onclick="modalClose('{{$game->id}}')" class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    Close
                                </button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </dialog>
            <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                <td class="p-2 border-r">{{$plataform->id}}</td>
                <td class="p-2 border-r">{{$plataform->name}}</td>
                <td class="p-2 border-r">
                    <a href="{{route('plataforms.edit', $plataform->id)}}" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">{{__('Edit')}}</a>

                    {{-- <a href="#" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a> --}}
                </td>
                <td  class="p-2 border-r">

                        <button type="button" onclick="openModal('{{$plataform->id}}')" class="px-4 py-2 bg-red-500 text-white rounded">{{__('Delete')}}</button>

                    {{-- <form action="{{route('plataforms.delete',$plataform->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">{{__('Delete')}}</button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
            {{$plataforms->links()}}

        </tbody>
    </table>
</div>
{{-- <table>
    <tr>
      <th>ID</th>
      <th>{{__('Name')}}</th>
    </tr>
    @foreach ($plataforms as $plataform)
        <tr>
            <td>{{$plataform->id}}</td>
            <td>{{$plataform->name}}</td>
            <td><a href="{{route('plataforms.edit', $plataform->id)}}">{{__('Edit')}}</a></td>
            <td><form action="{{route('plataforms.delete',$plataform->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit">{{__('Delete')}}</button>
            </form></td>
        </tr>
    @endforeach
    {{$plataforms->links()}}
  </table> --}}
@endsection
