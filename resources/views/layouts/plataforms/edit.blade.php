@extends('layouts.admin')
@section('content')
    <form action="{{route('plataforms.update', $plataform->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <label>{{__('Name')}}</label>
        <input type="text" name="name" value="{{$plataform->name}}">
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name')}}</p>
        @endif

        <button type="submit">{{__('Submit')}}</button>
    </form>
@endsection
