@extends('layouts.admin')
@section('content')
<table>
    <tr>
      <th>ID</th>
      <th>Name</th>
    </tr>
    @foreach ($plataforms as $plataform)
        <tr>
            <td>{{$plataform->id}}</td>
            <td>{{$plataform->name}}</td>
            <td><a href="{{route('plataforms.edit', $plataform->id)}}">Edit</a></td>
            <td><form action="{{route('plataforms.delete',$plataform->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit">Delete</button>
            </form></td>
        </tr>
    @endforeach
    {{$plataforms->links()}}
  </table>
@endsection
