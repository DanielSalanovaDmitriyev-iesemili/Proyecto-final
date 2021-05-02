
@extends('layouts.admin')
@section('content')
    <form action="{{route('games.update', $game->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <label>{{__('Name')}}</label>
        <input type="text" name="name" value="{{$game->name}}">
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name')}}</p>
        @endif
        <label>{{__('Description')}}</label>
        <input type="text" name="description" value="{{$game->description}}">
        @if($errors->has('description'))
            <p class="text-danger">{{ $errors->first('description')}}</p>
        @endif
        <label>{{__('Price')}}</label>
        <input type="number" name="price" step="0.01" value="{{$game->price}}">
        @if($errors->has('price'))
            <p class="text-danger">{{ $errors->first('price')}}</p>
        @endif
        <label>{{__('Image')}}</label>
        <input type="file" name="image">
        @if($errors->has('image'))
            <p class="text-danger">{{ $errors->first('image')}}</p>
        @endif
        <label>PEGI</label>
        <select name="pegi">
            <option value="3" {{($game->pegi == "3") ? 'selected' : ''}}>3</option>
            <option value="7" {{($game->pegi == "7") ? 'selected' : ''}}>7</option>
            <option value="12" {{($game->pegi == "12") ? 'selected' : ''}}>12</option>
            <option value="16" {{($game->pegi == "16") ? 'selected' : ''}}>16</option>
            <option value="18" {{($game->pegi == "18") ? 'selected' : ''}}>18</option>
        </select>
        @if($errors->has('pegi'))
            <p class="text-danger">{{ $errors->first('pegi')}}</p>
        @endif
        <label>{{__('Plataforms')}}</label>
        <select name="plataforms[]" multiple required>
            @foreach ($plataforms as $plataform)
                @if ($game->checkIfEmpty($game->categories))
                <option value="{{$plataform->id}}">{{$plataform->name}}</option>
                    @else
                        @foreach ($game->plataforms as $gamePlataform)
                            <option value="{{$plataform->id}}" {{($gamePlataform->id == $plataform->id) ? 'selected' : ''}}>{{$plataform->name}}</option>
                        @endforeach
                @endif

            @endforeach
        </select>
        @if($errors->has('plataforms'))
            <p class="text-danger">{{ $errors->first('plataforms')}}</p>
        @endif

        <label>{{__('Genres')}}</label>
        <select name="categories[]" multiple required>
            @foreach ($categories as $category)
                @if ($game->checkIfEmpty($game->categories))
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @else
                        @foreach ($game->categories as $gameCategory)
                            <option value="{{$category->id}}" {{($gameCategory->id == $category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                @endif
            @endforeach
        </select>
        @if($errors->has('categories'))
            <p class="text-danger">{{ $errors->first('categories')}}</p>
        @endif

        <label>{{__('State')}}</label>
        <select name="state">
            <option value="mal" {{($game->state == "mal") ? 'selected' : ''}}>mal</option>
            <option value="regular" {{($game->state == "regular") ? 'selected' : ''}}>regular</option>
            <option value="bien" {{($game->state == "bien") ? 'selected' : ''}}>bien</option>
            <option value="como nuevo" {{($game->state == "como nuevo") ? 'selected' : ''}}>como nuevo</option>
        </select>
        @if($errors->has('state'))
            <p class="text-danger">{{ $errors->first('state')}}</p>
        @endif

        <label>{{__('Published at')}}</label>
        <input type="date"name="published_at"
            value="{{$game->published_at}}"
            min="1970-01-01" max="2021-12-31">
        @if($errors->has('date'))
            <p class="text-danger">{{ $errors->first('date')}}</p>
        @endif
        <button type="submit">{{__('Submit')}}</button>
    </form>
@endsection
