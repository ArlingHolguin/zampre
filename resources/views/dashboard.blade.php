<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- <h1 class="bg-lese-50 text-lese-900 font-black text-2xl">Hola Mundo</h1> --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- @livewire('admin.show-products') --}}
            <div class="grid grid-cols-1 gap-1 md:grid-cols-3 mt-1 md:gap-4 ">
                
                <livewire:admin.dashboard.card-orders-count />               
                <livewire:admin.dashboard.card-products-count />
                <livewire:admin.dashboard.card-users-count />

            </div>
        </div>
        {{-- <div class="l-form">
            <form action="" class="form">
                <h1 class="form__title">Sign In</h1>

                <div class="form__div">
                    <input type="text" class="form__input" placeholder=" ">
                    <label for="" class="form__label">Email</label>
                </div>

                <div class="form__div">
                    <input type="password" class="form__input" placeholder=" ">
                    <label for="" class="form__label">Password</label>
                </div>

                <input type="submit" class="form__button" value="Sign In">
            </form>
        </div> --}}

    </div>
</x-admin-layout>
