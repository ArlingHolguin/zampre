<div class="relative mx-6 hidden md:block" style="z-index: 900;">
    @auth
        <x-jet-dropdown align="right" width="48">
            <x-slot name="trigger">

                <button
                    class="flex rounded-full border-2 border-transparent text-sm transition focus:border-gray-300 focus:outline-none">
                    <img class="h-8 w-8 rounded-full object-cover"
                        src="{{ Auth::user()->external_auth == 'google' && Auth::user()->profile_photo_path ? Auth::user()->profile_photo_path : Auth::user()->profile_photo_url }}"
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

                <x-jet-dropdown-link href="{{ route('orders.index') }}">
                    {{ __('Orders') }}
                </x-jet-dropdown-link>
                @role('superadmin|admin')
                <x-jet-dropdown-link href="{{ route('dashboard') }}">
                    {{ __('Administrator') }}
                </x-jet-dropdown-link>
                @endrole



                <div class="border-t border-gray-100"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-dropdown-link href="{{ route('logout') }}"
                        onclick="event.preventDefault();
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
