
<div class="flex h-screen">
    <div class="w-64 pr-6 border-r border-gray-200">
        <div class='m-5'>
            <div class='mt-4 mb-4'>
                <h4 class='border-b-2 border-gray-600'>{{__('All games')}}</h4>
                <div class='relative inline-flex mt-2'>
                    <a href="{{route('games.index')}}">{{__('All games')}}</a>
                </div>
            </div>
            <h1 class='uppercase font-bold'>{{__('Filters')}}</h1>
            <form method="GET" action="{{route('games.filter')}}">
                <div class="grid grid-cols-2">
                    <label class='text-sm font-semibold uppercase m-2'>
                        <input class='rounded ml-2 p-1 border-black border-2' type="text" name="title" id="searchName">
                    </label>
                    <div class='py-2 px-20'>
                        <button type='submit'><svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6 hover:text-blue-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z' />
                          </svg></button>
                    </div>
                </div>
                <div>
                    <h4 class='border-b-2 border-gray-600'>{{__('Genres')}}</h4>
                    <div class='relative inline-flex mt-2'>
                        <svg class='w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 412 232'><path d='M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z' fill='#648299' fill-rule='nonzero'/></svg>
                        <select name="genre" id="genre" class='border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none'>
                          <option value="" selected></option>
                          @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                      </div>
                </div>
                <div class='mt-4'>
                    <h4 class='border-b-2 border-gray-600'>{{__('Plataforms')}}</h4>
                    <div class='relative inline-flex mt-2'>
                        <svg class='w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 412 232'><path d='M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z' fill='#648299' fill-rule='nonzero'/></svg>
                        <select name="plataform" id="plataform" class='border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none'>
                            <option value="" selected></option>
                            @foreach ($plataforms as $plataform)
                                <option value="{{$plataform->id}}">{{$plataform->name}}</option>
                            @endforeach
                        </select>
                      </div>
                </div>
                <div class='mt-4'>
                    <h4 class='border-b-2 border-gray-600'>{{__('Initial Price')}}</h4>
                    <div class='relative inline-flex mt-2'>
                        <input name="iniPrice" type="number" step="0.01" class='border border-gray-300 rounded-full text-gray-600 h-10 pl-5 bg-white hover:border-gray-400 focus:outline-none appearance-none' style="width: 154px !important;">
                      </div>
                </div>
                <div class='mt-4'>
                    <h4 class='border-b-2 border-gray-600'>{{__('End Price')}}</h4>
                    <div class='relative inline-flex mt-2'>
                        <input name="endPrice" type="number" step="0.01" class='border border-gray-300 rounded-full text-gray-600 h-10 pl-5 bg-white hover:border-gray-400 focus:outline-none appearance-none' style="width: 154px !important;">
                      </div>
                </div>

                <button type="submit" class="bg-purple-500 mt-4 rounded-xl p-2 text-purple-50 hover:bg-purple-50 hover:text-purple-500">{{__('Search')}}</button>
            </form>
    </div>
</div>

