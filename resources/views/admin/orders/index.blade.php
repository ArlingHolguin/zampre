<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de órdenes') }}
        </h2>
    </x-slot>
    <div class="container py-12">

        <section class="grid md:grid-cols-7 gap-6 text-white">
            <a href="{{ route('admin.ordenes.index') . "?status=1" }}" class="bg-red-400 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$pendiente}}
                </p>
                <p class="uppercase text-center">Pendiente</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-business-time"></i>
                </p>
            </a>

            <a href="{{ route('admin.ordenes.index') . "?status=2" }}" class="bg-gray-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$recibido}}
                </p>
                <p class="uppercase text-center">Recibido</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-credit-card"></i>
                </p>
            </a>

            <a href="{{ route('admin.ordenes.index') . "?status=3" }}" class="bg-blue-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$enviado}}
                </p>
                <p class="uppercase text-center">Enviado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-truck"></i>
                </p>
            </a>

            <a href="{{ route('admin.ordenes.index') . "?status=4" }}" class="bg-green-700 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$entregado}}
                </p>
                <p class="uppercase text-center">Entregado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-check-circle"></i>
                </p>
            </a>

            <a href="{{ route('admin.ordenes.index') . "?status=5" }}" class="bg-red-600 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$anulado}}
                </p>
                <p class="uppercase text-center">Anulado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-times-circle"></i>
                </p>
            </a>

            <a href="{{ route('admin.ordenes.index') . "?status=6" }}" class="bg-orange-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$perdido}}
                </p>
                <p class="uppercase text-center">Perdido</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-times-circle"></i>
                </p>
            </a>
            <a href="{{ route('admin.ordenes.index') . "?status=7" }}" class="bg-orange-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$devuelto}}
                </p>
                <p class="uppercase text-center">Devuelto</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-times-circle"></i>
                </p>
            </a>
        </section>

        @if ($orders->count() > 0)
            <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
                <h1 class="text-2xl mb-4">Pedidos recientes</h1>

                <ul class="flex flex-col overflow-scroll">
                    @foreach ($orders as $order)
                        <li>
                            <a href="{{route('admin.orders.show', $order)}}" class="flex items-center py-2 px-4 hover:bg-gray-100">
                                <span class="w-12 text-center">
                                    @switch($order->status)
                                        @case(1)
                                            <i class="fas fa-business-time text-red-500 opacity-50"></i>
                                            @break
                                        @case(2)
                                            <i class="fas fa-credit-card text-gray-500 opacity-50"></i>
                                            @break
                                        @case(3)
                                            <i class="fas fa-truck text-yellow-500 opacity-50"></i>
                                            @break
                                        @case(4)
                                            <i class="fas fa-check-circle text-pink-500 opacity-50"></i>
                                            @break
                                        @case(5)
                                            <i class="fas fa-times-circle text-green-500 opacity-50"></i>
                                            @break
                                        @default

                                    @endswitch
                                </span>

                                <span>
                                    Orden: {{$order->code_id}}
                                    <br>
                                    {{$order->created_at->format('d/m/Y')}}
                                </span>


                                <div class="ml-auto">
                                    <span class="font-bold">
                                        @switch($order->status)
                                            @case(1)

                                                Pendiente

                                                @break
                                            @case(2)

                                                Recibido

                                                @break
                                            @case(3)

                                                Enviado

                                                @break
                                            @case(4)

                                                Entregado

                                                @break
                                            @case(5)

                                                Anulado

                                                @break
                                            @default

                                        @endswitch
                                    </span>

                                    <br>

                                    <span class="text-sm">
                                        {{$order->total}} COP
                                    </span>
                                </div>

                                <span>
                                    <i class="fas fa-angle-right ml-6"></i>
                                </span>

                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>
            
        @else
            <div class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
                <p>No hay pedidos por el momento</p>
            </div>
        @endif

    </div>
</x-admin-layout>