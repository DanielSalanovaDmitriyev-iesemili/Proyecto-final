@extends('layouts.admin')
@section('content')
    <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label > Name</label>
        <input type="text" name="name">
        <label > Description</label>
        <input type="text" name="description">
        <label >Image</label>
        <input type="file" name="img">
        <button type="submit">Submit</button>
    </form>
@endsection
