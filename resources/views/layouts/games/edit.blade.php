
@extends('layouts.admin')
@section('content')
<div class="mt-10 sm:mt-0">
    <div class="table p-2" style="width: 130%">
        @include('partials.admin-menu')
    </div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        {{__('Update a Game')}}
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{route('games.update', $game->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="name" class="block text-sm font-medium text-gray-700">{{__('Name')}}</label>
                  <input required type="text" name="name" id="name" autocomplete="name-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{$game->name}}">
                  @if($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name')}}</p>
                  @endif
                </div>
                <div class="col-span-6 sm:col-span-4">
                  <label for="description:es" class="block text-sm font-medium text-gray-700">{{__('Spanish Description')}}</label>
                  <textarea required name="description:es" id="description:es" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"  cols="30" rows="10">{{$game->translate('es')->description}}</textarea>
                  @if($errors->has('description:es'))
                    <p class="text-danger">{{ $errors->first('description:es')}}</p>
                  @endif
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <label for="description:en" class="block text-sm font-medium text-gray-700">{{__('English Description')}}</label>
                    <textarea required name="description:en" id="description:en" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"  cols="30" rows="10">{{$game->translate('en')->description}}</textarea>
                    @if($errors->has('description:en'))
                        <p class="text-danger">{{ $errors->first('description:en')}}</p>
                    @endif
                </div>
                <div class="col-span-6 sm:col-span-3">
                  <label for="pegi" class="block text-sm font-medium text-gray-700">PEGI</label>
                  <select required id="pegi" name="pegi" autocomplete="pegi" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="3" {{($game->pegi == "3") ? 'selected' : ''}}>3</option>
                    <option value="7" {{($game->pegi == "7") ? 'selected' : ''}}>7</option>
                    <option value="12" {{($game->pegi == "12") ? 'selected' : ''}}>12</option>
                    <option value="16" {{($game->pegi == "16") ? 'selected' : ''}}>16</option>
                    <option value="18" {{($game->pegi == "18") ? 'selected' : ''}}>18</option>
                  </select>
                  @if($errors->has('pegi'))
                    <p class="text-danger">{{ $errors->first('pegi')}}</p>
                  @endif
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="state" class="block text-sm font-medium text-gray-700">{{__('State')}}</label>
                    <select required id="state" name="state" autocomplete="state" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="mal" {{($game->state == "mal") ? 'selected' : ''}}>{{__('Bad')}}</option>
                        <option value="regular" {{($game->state == "regular") ? 'selected' : ''}}>{{__('Regular')}}</option>
                        <option value="bien" {{($game->state == "bien") ? 'selected' : ''}}>{{__('Good')}}</option>
                        <option value="como nuevo" {{($game->state == "como nuevo") ? 'selected' : ''}}>{{__('New')}}</option>
                    </select>
                    @if($errors->has('state'))
                      <p class="text-danger">{{ $errors->first('state')}}</p>
                    @endif
                  </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="price" class="block text-sm font-medium text-gray-700">{{__('Price')}}</label>
                    <input required type="number" name="price" id="price" step="0.01" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{$game->price}}">
                    @if($errors->has('price'))
                        <p class="text-danger">{{ $errors->first('price')}}</p>
                    @endif
                </div>


                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <span class="text-gray-700">{{__('Plataforms')}}</span>
                    <select name="plataforms[]" class="form-multiselect block w-full mt-1" multiple required>
                        @foreach ($plataforms as $plataform)
                        @if ($game->checkIfEmpty($game->plataforms))
                        <option value="{{$plataform->id}}">{{$plataform->name}}</option>
                            @else
                                @foreach ($game->plataforms as $gamePlataform)
                                    <option value="{{$plataform->id}}" {{($gamePlataform->id == $plataform->id) ? 'selected' : ''}}>{{$plataform->name}}</option>
                                @endforeach
                        @endif

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
                        @if ($game->checkIfEmpty($game->categories))
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @else
                                @foreach ($game->categories as $gameCategory)
                                    <option value="{{$category->id}}" {{($gameCategory->id == $category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                        @endif
                    @endforeach
                    </select>
                    @if($errors->has('categories'))
                        <p class="text-danger">{{ $errors->first('categories')}}</p>
                    @endif
                </div>
                <div class="col-span-6 sm:col-span-3 lg:col-span-12">
                    <label for="published_at" class="block text-sm font-medium text-gray-700">{{__('Published at')}}</label>
                    <input required type="date" name="published_at" id="published_at"  value="{{$game->published_at}}"
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
                        <input id="image" name="image" type="file" class="sr-only" >
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
   
@endsection
