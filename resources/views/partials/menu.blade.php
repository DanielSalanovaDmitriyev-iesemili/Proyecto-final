<div class="flex h-screen">
    <div class="w-64 p-6 hidden md:block border-r border-gray-200">
        <h6 class="font-bold mb-4">{{__('Quick actions')}}</h6>
        <ul class="mb-8">
            <li class="flex mb-8 text-gray-900 hover:bg-gray-200">
                <div class="bg-white shadow-sm mr-3 p-2 rounded-lg">
                    <img src="{{asset('img/home.svg')}}">
                </div>
                <a href="{{route('games.index')}}" class="self-center">{{__('Home')}}</a>
            </li>
            <li class="flex mb-8 text-gray-900 hover:bg-gray-200">
                <div class="bg-white shadow-sm mr-3 p-2 rounded-lg">
                    <img src="{{asset('img/mail.svg')}}">
                </div>
                <a href="{{route('mail.index')}}" class="self-center">{{__('Contact')}}</a>
            </li>
        </ul>

        <h6 class="font-bold mb-4">{{__('Utilities')}}</h6>
        <ul>
            <li class="flex mb-8 text-gray-900 hover:bg-gray-200">
                <div class="bg-white shadow-sm mr-3 p-2 rounded-lg">
                    <img src="{{asset('img/users.svg')}}">
                </div>
                <a href="{{route('chat.list')}}" class="self-center">Chat</a>
            </li>
            @if (Auth::check() && Auth::user()->rol_id == 1)
            <li class="flex mb-8 text-gray-900 hover:bg-gray-200">
                <div class="bg-white shadow-sm mr-3 p-2 rounded-lg">
                    <img src="{{asset('img/cog.svg')}}">
                </div>
                <a href="{{route('games.admin.list')}}" class="self-center">Admin</a>
            </li>
            @endif

        </ul>

            <h4 class='border-b-2 border-gray-600'>{{__('Languages')}}</h4>
                    <div class='relative inline-flex mt-2'>
                        <ul>
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                      </div>
</div>

