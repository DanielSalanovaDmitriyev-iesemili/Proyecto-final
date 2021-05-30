@extends('layouts.admin')
@section('content')

<div>

        <div class="table p-2" style="width: 130%">
            @include('partials.admin-menu')
        </div>
    <div class="mt-10 sm:mt-0">


        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            {{__('Create a Game')}}
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{route('games.store')}}" method="POST" enctype="multipart/form-data">
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
                    <div class="col-span-6 sm:col-span-4">
                      <label for="description:es" class="block text-sm font-medium text-gray-700">{{__('Spanish Description')}}</label>
                      <textarea required name="description:es" id="description:es" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"  cols="30" rows="10">{{old("description:es")}}</textarea>
                      @if($errors->has('description:es'))
                        <p class="text-danger">{{ $errors->first('description:es')}}</p>
                      @endif
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <label for="description:en" class="block text-sm font-medium text-gray-700">{{__('English Description')}}</label>
                        <textarea required name="description:en" id="description:en" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"  cols="30" rows="10">{{old("description:es")}}</textarea>
                        @if($errors->has('description:en'))
                            <p class="text-danger">{{ $errors->first('description:en')}}</p>
                        @endif
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label for="pegi" class="block text-sm font-medium text-gray-700">PEGI</label>
                      <select required id="pegi" name="pegi" autocomplete="pegi" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="3">3</option>
                        <option value="7">7</option>
                        <option value="12">12</option>
                        <option value="16">16</option>
                        <option value="18">18</option>
                      </select>
                      @if($errors->has('pegi'))
                        <p class="text-danger">{{ $errors->first('pegi')}}</p>
                      @endif
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="state" class="block text-sm font-medium text-gray-700">{{__('State')}}</label>
                        <select required id="state" name="state" autocomplete="state" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="mal">{{__('Bad')}}</option>
                            <option value="regular">{{__('Regular')}}</option>
                            <option value="bien">{{__('Good')}}</option>
                            <option value="como nuevo">{{__('New')}}</option>
                        </select>
                        @if($errors->has('state'))
                          <p class="text-danger">{{ $errors->first('state')}}</p>
                        @endif
                      </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="price" class="block text-sm font-medium text-gray-700">{{__('Price')}}</label>
                        <input required type="number" name="price" id="price" step="0.01" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{old("price")}}">
                        @if($errors->has('price'))
                            <p class="text-danger">{{ $errors->first('price')}}</p>
                        @endif
                    </div>


                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <span class="text-gray-700">{{__('Plataforms')}}</span>
                        <select name="plataforms[]" class="form-multiselect block w-full mt-1" multiple required>
                            @foreach ($plataforms as $plataform)
                                <option value="{{$plataform->id}}">{{$plataform->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('plataforms'))
                            <p class="text-danger">{{ $errors->first('plataforms')}}</p>
                         @endif
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <span class="text-gray-700">{{__('Genres')}}</span>
                        <select required name="categories[]" class="form-multiselect block w-full mt-1" multiple>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('categories'))
                            <p class="text-danger">{{ $errors->first('categories')}}</p>
                        @endif
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-12">
                        <label for="published_at" class="block text-sm font-medium text-gray-700">{{__('Published at')}}</label>
                        <input required type="date" name="published_at" id="published_at" value="2021-04-22"
                        min="1970-01-01" max="2021-12-31" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @if($errors->has('date'))
                            <p class="text-danger">{{ $errors->first('date')}}</p>
                        @endif
                    </div>


                  </div>
                  <div class="col-span-12">
                    <label class="block text-sm font-medium text-gray-700">
                        {{__('Image')}}
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                      <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                          <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                          <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>{{__('Select a image')}}</span>
                            <input id="image" name="image" type="file" class="sr-only" required>
                          </label>
                          <p class="pl-1">{{__('or drag and drop')}}</p>
                        </div>
                        <p class="text-xs text-gray-500">
                          PNG, JPG
                        </p>
                      </div>
                      @if($errors->has('image'))
                        <p class="text-danger">{{ $errors->first('image')}}</p>
                     @endif
                    </div>
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

</div>





    {{-- <form action="{{route('games.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>{{__('Name')}}</label>
        <input type="text" name="name" value="{{old("name")}}">
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name')}}</p>
        @endif
        <label>{{__('Description')}} Español</label>
        <input type="text" name="description:es" value="{{old("description:es")}}">
        @if($errors->has('description:es'))
            <p class="text-danger">{{ $errors->first('description:es')}}</p>
        @endif
        <label>{{__('Description')}} English</label>
        <input type="text" name="description:en" value="{{old("description:en")}}">
        @if($errors->has('description:en'))
            <p class="text-danger">{{ $errors->first('description:en')}}</p>
        @endif
        <label>{{__('Price')}}</label>
        <input type="number" name="price" step="0.01" value="{{old("price")}}">
        @if($errors->has('price'))
            <p class="text-danger">{{ $errors->first('price')}}</p>
        @endif
        <label>{{__('Image')}}</label>
        <input type="file" name="image" required>
        @if($errors->has('image'))
            <p class="text-danger">{{ $errors->first('image')}}</p>
        @endif
        <label>PEGI</label>
        <select name="pegi">
            <option value="3">3</option>
            <option value="7">7</option>
            <option value="12">12</option>
            <option value="16">16</option>
            <option value="18">18</option>
        </select>
        @if($errors->has('pegi'))
            <p class="text-danger">{{ $errors->first('pegi')}}</p>
        @endif
        <label>{{__('Plataforms')}}</label>
        <select name="plataforms[]" multiple required>
            @foreach ($plataforms as $plataform)
                <option value="{{$plataform->id}}">{{$plataform->name}}</option>
            @endforeach
        </select>
        @if($errors->has('plataforms'))
            <p class="text-danger">{{ $errors->first('plataforms')}}</p>
        @endif

        <label>{{__('Genres')}}</label>
        <select name="categories[]" multiple required>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @if($errors->has('categories'))
            <p class="text-danger">{{ $errors->first('categories')}}</p>
        @endif

        <label>{{__('State')}}</label>
        <select name="state">
            <option value="mal">mal</option>
            <option value="regular">regular</option>
            <option value="bien">bien</option>
            <option value="como nuevo">como nuevo</option>
        </select>
        @if($errors->has('state'))
            <p class="text-danger">{{ $errors->first('state')}}</p>
        @endif

        <label>{{__('Published at')}}</label>
        <input type="date"name="published_at"
            value="2021-04-22"
            min="1970-01-01" max="2021-12-31">
        @if($errors->has('date'))
            <p class="text-danger">{{ $errors->first('date')}}</p>
        @endif
        <button type="submit">{{__('Submit')}}</button>
    </form> --}}
@endsection
