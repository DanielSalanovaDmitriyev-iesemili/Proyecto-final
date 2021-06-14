@extends('layouts.admin')
@section('content')
<div class="mt-10 sm:mt-0">
    <div class="table p-2" style="width: 220%">
        @include('partials.admin-menu')
    </div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        {{__('Create a Plataform')}}
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{route('plataforms.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="name" class="block text-sm font-medium text-gray-700">{{__('Name')}}</label>
                  <input required type="text" name="name" id="name" autocomplete="name-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{old("name")}}">
                  @if($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name')}}</p>
                  @endif
                </div>
              </div>

            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{__('Save')}}
                </button>
              </div>
          </div>

        </form>
      </div>
    </div>
  </div>
    
@endsection
