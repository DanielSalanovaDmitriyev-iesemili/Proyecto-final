@extends('layouts.admin')
@section('content')
    <form action="{{route('plataforms.update', $plataform->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <label>Name</label>
        <input type="text" name="name" value="{{$plataform->name}}">
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name')}}</p>
        @endif

        <button type="submit">Submit</button>
    </form>
@endsection
