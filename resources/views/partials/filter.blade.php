<form id="form1" action="{{route('games.filter')}}" method="GET">
    <h5>Plataformas</h5>
    <select name="plataform" id="plataform">
        <option value="" selected></option>
        @foreach ($plataforms as $plataform)
            <option value="{{$plataform->name}}">{{$plataform->name}}</option>
        @endforeach
    </select>

    <h5>Generos</h5>
    <select name="genre" id="genre">
        <option value="" selected></option>
        @foreach ($categories as $category)
            <option value="{{$category->name}}">{{$category->name}}</option>
        @endforeach
    </select>

    <h5>Estado</h5>
    <select name="state" id="state">
        <option value="" selected></option>
        <option value="mal">Mal</option>
        <option value="regular">regular</option>
        <option value="bien">bien</option>
        <option value="como nuevo">como nuevo</option>
    </select>

    <h5>Precio</h5>
    <h6>Precio Inicial</h6>
    <input type="number" name="iniPrice">
    <h6>Precio Final</h6>
    <input type="number" name="endPrice">

    <button type="submit">Search</button>
</form>


