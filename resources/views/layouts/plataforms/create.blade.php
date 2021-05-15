@extends('layouts.admin')
@section('content')
    <form action="{{route('plataforms.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>{{__('Name')}}</label>
        <input type="text" name="name" value="{{old("name")}}">
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name')}}</p>
        @endif

        <button type="submit">{{__('Submit')}}</button>
    </form>
@endsection
