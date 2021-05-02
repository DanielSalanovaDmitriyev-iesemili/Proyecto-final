@extends('layouts.admin')
@section('content')
    <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label > {{__('Name')}}</label>
        <input type="text" name="name" value="{{old("name")}}">
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name')}}</p>
        @endif
        <label > {{__('Description')}}</label>
        <input type="text" name="description" value="{{old("description")}}">
        @if($errors->has('description'))
            <p class="text-danger">{{ $errors->first('description')}}</p>
        @endif
        <label >{{__('Image')}}</label>
        <input type="file" name="image" required>
        @if($errors->has('image'))
            <p class="text-danger">{{ $errors->first('image')}}</p>
        @endif
        <button type="submit">{{__('Submit')}}</button>
    </form>
@endsection
