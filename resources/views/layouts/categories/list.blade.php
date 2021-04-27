@extends('layouts.admin')
@section('content')
<table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Image</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>{{$category->img}}</td>
            <td><a href="{{route('categories.edit', $category->id)}}">Edit</a></td>
            <td><form action="{{route('categories.delete',$category->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit">Delete</button>
            </form></td>
        </tr>
    @endforeach
    {{$categories->links()}}
  </table>
@endsection
