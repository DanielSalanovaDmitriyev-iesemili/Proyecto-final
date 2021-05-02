@extends('layouts.admin')
@section('content')
<table>
    <tr>
      <th>ID</th>
      <th>{{__('Name')}}</th>
      <th>{{__('Description')}}</th>
      <th>{{__('Image')}}</th>
      <th>Pegi</th>
      <th>{{__('Price')}}</th>
      <th>{{__('State')}}</th>
      <th>{{__('Plataforms')}}</th>
      <th>{{__('Genres')}}</th>
      <th></th>
      <th></th>
    </tr>
    @foreach ($games as $game)
        <tr>
            <td>{{$game->id}}</td>
            <td>{{$game->name}}</td>
            <td>{{$game->description}}</td>
            <td>{{$game->img}}</td>
            <td>{{$game->pegi}}</td>
            <td>{{$game->price}}</td>
            <td>{{$game->state}}</td>
            <td>
                @foreach ($game->plataforms()->get() as $plataform)
                    {{$plataform->name}}
                @endforeach
            </td>
            <td>
                @foreach ($game->categories as $category)
                    {{$category->name}}
                @endforeach
            </td>
            <td><a href="{{route('games.edit', $game->id)}}">{{__('Edit')}}</a></td>
            <td><form action="{{route('games.delete',$game->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit">{{__('Delete')}}</button>
            </form></td>
        </tr>
    @endforeach
    {{$games->links()}}
  </table>
@endsection
