<nav class="bg-ligth shadow-sm" x-data="{ open:false }">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
  
        <!-- Mobile menu button-->  
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          
          <button x-on:click=" open = true " type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Abrir menú principal</span>
            <!--
              Icon when menu is closed.
  
              Heroicon name: outline/menu
  
              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!--
              Icon when menu is open.
  
              Heroicon name: outline/x
  
              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
  
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <!-- Logo-->  
          <a href="/" class="flex-shrink-0 flex items-center">
            <img class="block lg:hidden h-10 w-auto" src="{{asset('assets/images/logo/logo-main.svg')}}" alt="LaMegaTiendaTuren">
            <img class="hidden lg:block h-10 w-auto" src="{{asset('assets/images/logo/logo-main-text.svg')}}" alt="LaMegaTiendaTuren">
          </a>
  
          <!-- Menu Lg-->
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              {{-- <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a> --}}
              {{-- <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Team</a> --}}
              {{-- @foreach ($categories as $cat)
              <a href="{{route('posts.category', $cat)}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{$cat->name}}</a>
              @endforeach --}}
              
            </div>
          </div>
        </div>
  
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <!-- button notificacion-->
          <!-- <button class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
            <span class="sr-only">View notifications</span>
             Heroicon name: outline/bell 
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
          </button>  -->
          <div class="relative mr-2" x-data="{ open: false }">
            <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
            <button type="button" x-on:click=" open = true " class="text-gray-500 group inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
              <!--
                Heroicon name: solid/chevron-down

                Item active: "text-gray-600", Item inactive: "text-gray-400"
              -->
              <svg class="text-gray-400 group-hover:text-gray-500 h-7 w-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
                <path d="M21.822,7.431C21.635,7.161,21.328,7,21,7H7.333L6.179,4.23C5.867,3.482,5.143,3,4.333,3H2v2h2.333l4.744,11.385 C9.232,16.757,9.596,17,10,17h8c0.417,0,0.79-0.259,0.937-0.648l3-8C22.052,8.044,22.009,7.7,21.822,7.431z"></path><circle cx="10.5" cy="19.5" r="1.5"></circle><circle cx="17.5" cy="19.5" r="1.5"></circle>
              </svg>
              @if(Cart::count() > 0)
              <div class="notify-m"> <span class="heartbit-m"></span>{{Cart::count()}}</div>
              @endif
            </button>

            <!--
              'More' flyout menu, show/hide based on flyout menu state.

              Entering: "transition ease-out duration-200"
                From: "opacity-0 translate-y-1"
                To: "opacity-100 translate-y-0"
              Leaving: "transition ease-in duration-150"
                From: "opacity-100 translate-y-0"
                To: "opacity-0 translate-y-1"
            -->
            <div x-show="open" x-on:click.away=" open = false " class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-md sm:px-0">
              <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                @if(Cart::count() > 0)
                  @foreach(Cart::content() as $item)
                  <div class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-100">
                    <div class="box-border h-32 w-32 p-2 border-2 flex-1">
                      <img class="w-30 h-30 pt-2" src="{{Storage::url($item->model->image->url)}}" alt="{{$item->model->name}}">
                    </div>
                    <div class="ml-4 flex-1">
                      <p class="text-base font-bold text-gray-900">
                        {{$item->model->product}}
                      </p>
                      <div class="justify-center">
                        <input type="number" value="{{$item->qty}}" data-max="120" class="form-comtrol w-20" >
                      </div>
                      <p class="mt-2 text-center text-sm font-medium text-gray-700">
                        {{$item->model->price}}$
                      </p>
                    </div>
                    <div class="box-border h-32 w-32 p-5 flex-1">
                      <button type="button" class="">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:"><path d="M6 7C5.447 7 5 7 5 7v13c0 1.104.896 2 2 2h10c1.104 0 2-.896 2-2V7c0 0-.447 0-1 0H6zM16.618 4L15 2 9 2 7.382 4 3 4 3 6 8 6 16 6 21 6 21 4z"></path></svg>
                      </button>
                    </div>
                  </div>
                  @endforeach
                @else
                <p class="text-base font-bold text-center text-gray-900">
                  Carrito de compras vacio
                </p>
                @endif    
                </div>
                <div class="px-5 py-5 bg-gray-50 sm:px-8 sm:py-8">
                  <div>
                    <h3 class="text-sm tracking-wide font-medium text-gray-500 uppercase">
                      Recent Posts
                    </h3>
                    <ul class="mt-4 space-y-4">
                      <li class="text-base truncate">
                        <a href="#" class="font-medium text-gray-900 hover:text-gray-700">
                          Boost your conversion rate
                        </a>
                      </li>

                      <li class="text-base truncate">
                        <a href="#" class="font-medium text-gray-900 hover:text-gray-700">
                          How to use search engine optimization to drive traffic to your site
                        </a>
                      </li>

                      <li class="text-base truncate">
                        <a href="#" class="font-medium text-gray-900 hover:text-gray-700">
                          Improve your customer experience
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="mt-5 text-sm">
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> View all posts <span aria-hidden="true">&rarr;</span></a>
                  </div>
                </div>
              </div>
            </div>  
          </div>  
          <!-- Profile dropdown -->
          @auth
  
            <div class="ml-3 relative" x-data="{ open: false }">
              <div>
                <button x-on:click=" open = true " type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-expanded="false" aria-haspopup="true">
                  <span class="sr-only">Abrir menú de usuario</span>
                  <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
                </button>
              </div>
  
              <!--
                Dropdown menu, show/hide based on menu state.
  
                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div x-show="open" x-on:click.away=" open = false " class="z-40 origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Tu Perfil</a>
                
                
                  <a href="{{ route('admin.home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Panel Administrativo</a>  
                
  
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" onclick="event.preventDefault();
                  this.closest('form').submit();">Cerrar Sesión</a>
              </form>
                
              </div>
            </div>
  
  
                
            @else
            <a href="{{ route('login') }}" class="text-gray-800 hover:bg-red-600 hover:text-white hidden sm:block px-3 py-2 rounded-md text-base font-medium">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="text-gray-800 hover:bg-red-600 hover:text-white hidden sm:block px-3 py-2 rounded-md text-base font-medium">Registrase</a>    
            
          @endauth
        </div>
      </div>
    </div>
  
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show="open" x-on:click.away=" open = false ">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <a href="{{ route('login') }}" class="text-gray-800 hover:bg-red-600 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="text-gray-800 hover:bg-red-600 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Registrase</a>
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
  {{--       <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a> --}}
        {{-- @foreach ($categories as $cat)
        <a href="{{route('posts.category', $cat)}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">{{ $cat->name }}</a>
        @endforeach --}}
        
      </div>
    </div>
  </nav>