<div class="mx-6 relative hidden md:block" style="z-index: 900;">
    @auth
        <x-jet-dropdown align="right" width="48">
            <x-slot name="trigger">

                <button
                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                </button>

            </x-slot>

            <x-slot name="content">
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Account') }}
                </div>

                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                    {{ __('Profile') }}
                </x-jet-dropdown-link>

                <x-jet-dropdown-link href="{{route('orders.index')}}">
                    {{ __('Orders') }}
                </x-jet-dropdown-link>

                <x-jet-dropdown-link href="{{route('dashboard')}}">
                    {{ __('Administrator') }}
                </x-jet-dropdown-link>



                <div class="border-t border-gray-100"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-dropdown-link>
                </form>
            </x-slot>
        </x-jet-dropdown>
    @else
        <x-jet-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="flex items-center justify-center">
                    <x-user size="40" color="white" />
                </button>

            </x-slot>

            <x-slot name="content">
                <x-jet-dropdown-link href="{{ route('login') }}">
                    {{ __('Login') }}
                </x-jet-dropdown-link>

                <x-jet-dropdown-link href="{{ route('register') }}">
                    {{ __('Register') }}
                </x-jet-dropdown-link>
            </x-slot>
        </x-jet-dropdown>

    @endauth


</div>
