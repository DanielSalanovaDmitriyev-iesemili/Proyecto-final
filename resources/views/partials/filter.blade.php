<form id="form1" action="{{route('games.filter')}}" method="GET">
    <h5>{{__('Plataforms')}}</h5>
    <select name="plataform" id="plataform">
        <option value="" selected></option>
        @foreach ($plataforms as $plataform)
            <option value="{{$plataform->name}}">{{$plataform->name}}</option>
        @endforeach
    </select>

    <h5>{{__('Genres')}}</h5>
    <select name="genre" id="genre">
        <option value="" selected></option>
        @foreach ($categories as $category)
            <option value="{{$category->name}}">{{$category->name}}</option>
        @endforeach
    </select>

    <h5>{{__('State')}}</h5>
    <select name="state" id="state">
        <option value="" selected></option>
        <option value="mal">{{__('Bad')}}</option>
        <option value="regular">{{__('Regular')}}</option>
        <option value="bien">{{__('Good')}}</option>
        <option value="como nuevo">{{__('New')}}</option>
    </select>

    <h5>{{__('Price')}}</h5>
    <h6>{{__('Initial Price')}}</h6>
    <input type="number" name="iniPrice">
    <h6>{{__('End Price')}}</h6>
    <input type="number" name="endPrice">

    <h5>{{__('Search Name')}}</h5>
    <input type="text" name="title" id="searchName">
    <button type="submit">{{__('Search')}}</button>
</form>



