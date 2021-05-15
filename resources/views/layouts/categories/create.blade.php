@extends('layouts.admin')
@section('content')
    <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label > {{__('Name')}}</label>
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
        <label >{{__('Image')}}</label>
        <input type="file" name="image" required>
        @if($errors->has('image'))
            <p class="text-danger">{{ $errors->first('image')}}</p>
        @endif
        <button type="submit">{{__('Submit')}}</button>
    </form>
@endsection
