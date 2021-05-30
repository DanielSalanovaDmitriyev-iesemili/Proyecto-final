<div class="flex mb-4 justify-between">
    <div class="flex flex-row">
        <div  class="bg-purple-400 text-purple-50 rounded-md mr-2" style="background-color: rgba(167, 139, 250, var(--tw-bg-opacity)); ">
            <a href="{{route('games.admin.list')}}" style="text-decoration:none; color:white;">{{__('Games')}}</a>
        </div>
        <div class="bg-purple-400 text-purple-50 hover:bg-purple-50 rounded-md mr-2" style="background-color: rgba(167, 139, 250, var(--tw-bg-opacity)); ">
            <a href="{{route('categories.admin.list')}}" style="text-decoration:none; color:white;">{{__('Genres')}}</a>
        </div>
        <div class="bg-purple-400 text-purple-50 hover:bg-purple-50 rounded-md mr-2" style="background-color: rgba(167, 139, 250, var(--tw-bg-opacity)); ">
            <a href="{{route('plataforms.admin.list')}}" style="text-decoration:none; color:white;">{{__('Plataforms')}}</a>
        </div>
    </div>
    <div class="flex flex-row">
        <div class="bg-purple-400 text-purple-50 hover:bg-purple-50 rounded-md mr-2 " style="background-color: rgba(167, 139, 250, var(--tw-bg-opacity)); ">
            <a href="{{route('games.create')}}" style="text-decoration:none; color:white;">{{__('Make game')}}</a>
        </div>
        <div class="bg-purple-400 text-purple-50 hover:bg-purple-50 rounded-md mr-2" style="background-color: rgba(167, 139, 250, var(--tw-bg-opacity)); ">
            <a href="{{route('categories.create')}}" style="text-decoration:none; color:white;">{{__('Make genre')}}</a>
        </div>
        <div class="bg-purple-400 text-purple-50 hover:bg-purple-50 rounded-md mr-2" style="background-color: rgba(167, 139, 250, var(--tw-bg-opacity)); ">
            <a href="{{route('plataforms.create')}}" style="text-decoration:none; color:white;">{{__('Make plataform')}}</a>
        </div>
        <div class="bg-purple-400 text-purple-50 hover:bg-purple-50 rounded-md mr-2" style="background-color: rgba(167, 139, 250, var(--tw-bg-opacity)); ">
            <a href="{{route('comment.index')}}" style="text-decoration:none; color:white;">{{__('List messages')}}</a>
        </div>
    </div>

</div>
