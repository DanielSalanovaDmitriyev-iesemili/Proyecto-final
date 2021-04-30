@extends('layouts.admin')
@section('content')
    <form action="{{route('games.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name</label>
        <input type="text" name="name" value="{{old("name")}}">
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name')}}</p>
        @endif
        <label > Description</label>
        <input type="text" name="description" value="{{old("description")}}">
        @if($errors->has('description'))
            <p class="text-danger">{{ $errors->first('description')}}</p>
        @endif
        <label >Image</label>
        <input type="file" name="image" required>
        @if($errors->has('image'))
            <p class="text-danger">{{ $errors->first('image')}}</p>
        @endif

        

        <button type="submit">Submit</button>
    </form>
@endsection
