@extends('layouts.admin')
@section('content')
    <form action="{{route('games.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>{{__('Name')}}</label>
        <input type="text" name="name" value="{{old("name")}}">
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name')}}</p>
        @endif
        <label>{{__('Description')}}</label>
        <input type="text" name="description" value="{{old("description")}}">
        @if($errors->has('description'))
            <p class="text-danger">{{ $errors->first('description')}}</p>
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
    </form>
@endsection
