<div class="bg-white flex p-6 shadow-sm">
    <img src="../src/img/menu.svg" class="md:hidden block mr-4">
    <h6 class="text-2xl font-bold flex-grow">Gamestore</h6>
    @if (Route::has('login'))
                <div class="hidden top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    <div class="group inline-block">
                        <button
                          class="outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32"
                        >
                          <span class="pr-1 font-semibold flex-1">{{ Auth::user()->name }}</span>
                          <span>
                            <svg
                              class="fill-current h-4 w-4 transform group-hover:-rotate-180
                              transition duration-150 ease-in-out"
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 20 20"
                            >
                              <path
                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                              />
                            </svg>
                          </span>
                        </button>
                        <ul
                          class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute
                        transition duration-150 ease-in-out origin-top min-w-32"
                        >
                          <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">{{__('Logout')}}</button>
                            </form>
                         </li>
                        </ul>
                      </div>

                      <style>
                        /* since nested groupes are not supported we have to use
                           regular css for the nested dropdowns
                        */
                        li>ul                 { transform: translatex(100%) scale(0) }
                        li:hover>ul           { transform: translatex(101%) scale(1) }
                        li > button svg       { transform: rotate(-90deg) }
                        li:hover > button svg { transform: rotate(-270deg) }

                        /* Below styles fake what can be achieved with the tailwind config
                           you need to add the group-hover variant to scale and define your custom
                           min width style.
                             See https://codesandbox.io/s/tailwindcss-multilevel-dropdown-y91j7?file=/index.html
                             for implementation with config file
                        */
                        .group:hover .group-hover\:scale-100 { transform: scale(1) }
                        .group:hover .group-hover\:-rotate-180 { transform: rotate(180deg) }
                        .scale-0 { transform: scale(0) }
                        .min-w-32 { min-width: 8rem }
                      </style>

                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">{{__('Log in')}}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">{{__('Register')}}</a>
                        @endif
                    @endauth
                </div>
    @endif
</div>
