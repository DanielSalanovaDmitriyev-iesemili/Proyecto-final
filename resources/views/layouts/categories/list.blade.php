@extends('layouts.admin')
@section('content')
<table>
    <tr>
      <th>ID</th>
      <th>{{__('Name')}}</th>
      <th> {{__('Description')}}</th>
      <th>{{__('Image')}}</th>
      <th></th>
      <th></th>
    </tr>
    @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>{{$category->img}}</td>
            <td><a href="{{route('categories.edit', $category->id)}}">{{__('Edit')}}</a></td>
            <td><form action="{{route('categories.delete',$category->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit">{{__('Delete')}}</button>
            </form></td>
        </tr>
    @endforeach
    {{$categories->links()}}
  </table>
@endsection
