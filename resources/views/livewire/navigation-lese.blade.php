<header class="bg-gray-500 sticky top-0" x-data="{ open: false }" style="z-index: 900;">
    <div class="container flex items-center h-16 justify-between md:justify-start">
        {{-- Icono hamburguesa --}}
        <a x-on:click="open = !open"
            class="flex flex-col items-center text-white order-last md:order-first">
            <button class="menu"
                onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))"
                aria-label="Main Menu">
                <svg width="40" height="40" viewBox="0 0 100 100">
                    <path class="line line1"
                        d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                    <path class="line line2" d="M 20,50 H 80" />
                    <path class="line line3"
                        d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                </svg>
            </button>
            {{-- <span class="font-semibold">Categorías</span> --}}
        </a>
        {{-- logo --}}
        <a href="/" class="mx-6">
            {{-- <x-jet-application-mark class="block h-9 w-auto" /> --}}
            <img src="{{asset('img/icono_logo.svg')}}" width="50" alt="logo">
        </a>
        {{-- buscador --}}
        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>


        <!-- Dropdown user -->
        
        <livewire:partials.dropdown-user-menu />
        

        {{-- llamado de componente de livewire dropdowm-cart --}}
        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>
        {{-- icono cart movil --}}
        <div class=" md:hidden pt-2">
            <div class="mr-7">
                @livewire('cart-mobile')
            </div>


        </div>
    </div>
  
    <nav id="navigation-menu"  
        x-show="open"
        :class="{'block': open, 'hidden': !open}"
        x-transition:enter="transition duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="w-full absolute bg-gray-800 bg-opacity-80 hidden duration-500">
        {{-- Menu computador --}}
        <div class="container h-full hidden md:block">
            <div {{-- x-on:click.away="open = false" --}} class="grid grid-cols-4 h-full relative">
                <ul class="bg-lese-900 h-full">
                    @foreach ($categories as $category)
                        <li style="margin-top: 0.10rem;" class="navigation-link text-gray-700 font-black hover:bg-orange-400 hover:text-gray-900 hover:font-black transition ease-in-out delay-100 hover:-translate-x-1 hover:scale-110 duration-300">
                            <a href="{{ route('categories.show', $category) }}"
                                class="py-2 px-4 text-sm flex items-center">
                                <span class="flex justify-center w-9 mr-2 hover:animate-spin">
                                    {!! $category->icon !!}
                                </span>
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="col-span-3 bg-orange-400">
                    {{-- Componente blade navigation-subcategories --}}

                </div>
            </div>
        </div>
        {{-- Menu mobil --}}
        <div class="bg-lese-900 h-full overflow-y-auto">
            {{-- Buscador mobile  --}}
            <div class="container p-3 bg-black mb-3">
                @livewire('search')
            </div>
            <ul class="mt-2">
                @foreach ($categories as $category)
                <li style="margin-top: 0.10rem;" class="text-gray-700 font-black hover:bg-yellow-400 hover:text-gray-900 hover:font-black transition ease-in-out delay-100 hover:-translate-x-1 hover:scale-100 duration-300">
                    <a href="{{ route('categories.show', $category) }}"
                        class="py-2 px-4 text-sm flex items-center">
                        <span class="flex justify-center w-9 mr-2 hover:animate-spin">
                            {!! $category->icon !!}
                        </span>
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
                
            </ul>
            <div class="mt-3">

                @auth
                <span style="margin-top: 0.10rem;" class="text-gray-700 font-black hover:bg-yellow-400 hover:text-gray-900 hover:font-black transition ease-in-out delay-100      hover:-translate-x-1 hover:scale-100 duration-300">
                    <a href="{{ route('profile.show') }}"
                        class="py-2 px-4 text-sm flex items-center">
                        <i class="fas fa-id-badge ml-3 text-lg mr-2"></i>
                        Perfil
                    </a>
                    </span>
                    <span style="margin-top: 0.10rem;" class="text-gray-700 font-black hover:bg-yellow-400 hover:text-gray-900 hover:font-black transition ease-in-out delay-100      hover:-translate-x-1 hover:scale-100 duration-300">
                        <a href="" onclick="event.preventDefault();
                            document.getElementById('logout_form').submit()"
                            class="py-2 px-4 text-sm flex items-center">
                            <i class="fas fa-power-off ml-3 text-lg mr-2"></i>
                            Cerrar Sesión
                        </a>
                    
                    <form id="logout_form" action="{{ route('logout') }}" method="post" class="hidden">
                        @csrf
                    </form>
                </span>
                @else
                <span style="margin-top: 0.10rem;" class="text-gray-700 font-black hover:bg-yellow-400 hover:text-gray-900 hover:font-black transition ease-in-out delay-100      hover:-translate-x-1 hover:scale-100 duration-300">
                    <a href="{{ route('register') }}"
                        class="py-2 px-4 text-sm flex items-center">
                        <i class="fas fa-id-badge ml-3 text-lg mr-2"></i>
                        Registro
                    </a>
                    </span>
                    <span style="margin-top: 0.10rem;" class="text-gray-700 font-black hover:bg-yellow-400 hover:text-gray-900 hover:font-black transition ease-in-out delay-100      hover:-translate-x-1 hover:scale-100 duration-300">
                        <a href="{{ route('login') }}"
                            class="py-2 px-4 text-sm flex items-center">
                            <i class="fas fa-id-badge ml-3 text-lg mr-2"></i>
                            Entrar
                        </a>
                        </span>
    
    
                @endauth
            </div>
            

        </div>


    </nav>
</header>
