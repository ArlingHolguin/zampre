<div class="container py-8">
    <section class="bg-white rounded-lg shadow-lg p-6 text-trueGray-900">
        <div class="flex items-center bg-gray-100 p-2 rounded-md">
            <div>
                <span class="bg-lese-400 rounded-md h-8 w-8 flex items-center justify-center">
                    {{-- <i class="fas fa-shopping-cart"></i> --}}
                    {{-- <i class="fas fa-box"></i> --}}
                    {{-- <i class="fas fa-boxes-packing"></i> --}}
                    <i class="fas fa-box"></i>
                </span>

            </div>
            <div class="items-center">
                @if (Cart::count())
                    <h1 class="text-xl font-bold ml-2"> Mi Pedido en curso</h1>
                @else
                    <h1 class="text-xl font-bold ml-2"> Crea tu pedido</h1>
                @endif
                
            </div>

        </div>

        @if (Cart::count())

            <table class="table-auto w-full mt-2">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach (Cart::content() as $item)

                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                                    <div>
                                        <p class="font-bold text-sm">{{ $item->name }}</p>
                                        <p class="text-xs uppercase">{{ $item->options->referencia }}</p>
                                        {{-- <p class="text-xs uppercase">{{ $item->qty_available }}</p> --}}

                                        
                                    </div>
                                </div>
                            </td>



                            <td class="text-center">
                                <div class="flex">
                                    <span>$ {{ $item->price }}</span>


                                </div>

                            </td>

                            <td>
                                <div class="flex justify-center">
                                    @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                </div>
                            </td>

                            <td class="text-center">
                                $ {{ $item->price * $item->qty }}
                            </td>
                            <td class="flex items-center pt-3">
                                <a class="ml-6 cursor-pointer hover:text-greenLime-500"
                                    wire:click="delete('{{ $item->rowId }}')"
                                    wire:loading.class="text-red-600 opacity-25"
                                    wire:target="delete('{{ $item->rowId }}')">
                                    <span
                                        class="bg-lese-200 rounded-md h-7 w-7 flex items-center justify-center cursor-pointer hover:bg-trueGray-800 hover:text-white">
                                        <i class="fas fa-trash-alt"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

            <div class=" my-4 flex justify-between items-center bg-gray-100 p-4 rounded-md">
                <div class="items-center">
                    <p class="font-bold text-sm">Borrar Pedido <i
                            class="fas fa-arrow-right pt-2 mx-2 text-lg text-greenLime-500"></i> </p>
                </div>
                <div>


                    {{-- <a class="text-sm cursor-pointer hover:underline mt-3 inline-block" 
                        wire:click="destroy">
                        <i class="fas fa-trash"></i>
                        Quitar todo
                    </a> --}}

                    <a class="bg-lese-200 rounded-md h-8 w-8 flex items-center justify-center cursor-pointer hover:bg-trueGray-800 hover:text-white"
                        wire:click="destroy">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>

            </div>

        @else
            <div class="flex flex-col items-center mt-4">
                <a href="{{ route('home') }}"
                    class="bg-lese-50 rounded-md h-50 w-50 flex items-center justify-center cursor-pointer hover:bg-trueGray-100">
                    
                </a>
                <p class="text-lg text-gray-700 mt-4">No tienes productos en la caja.</p>

                <x-danger-enlace href="{{route('home') }}" class="mt-4 px-16">
                    Volver
                </x-danger-enlace>
            </div>
        @endif

    </section>

    @if (Cart::count())

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">


                    <span class="bg-lese-400 rounded-md h-8 w-8 flex items-center justify-center">
                        {{-- <i class="fas fa-file-invoice-dollar"></i> --}}
                        <img src="{{asset('vendor/icons/card-animated.gif')}}" alt="Card">
                    </span>

                    <p class="text-gray-700 ml-2">
                        <span class="font-bold text-lg bg-gray-100 p-2 rounded-md">
                            $ {{ Cart::subTotal() }}
                        </span>

                    </p>


                </div>

                <div>
                    <x-danger-enlace href="{{route('orders-create')}}">
                        Continuar
                    </x-danger-enlace>
                </div>
            </div>
        </div>

    @endif
</div>
