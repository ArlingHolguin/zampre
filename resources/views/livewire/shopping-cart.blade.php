<div class="container py-8">
    <style>
        [wire\:loading-inline] {
    display: inline-block;
}

/* Estilos personalizados para el modal */
.jetstream-modal {
    display: flex;
    margin-top: 50px;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.jetstream-modal .modal {
    width: 50%; /* Ajusta esto según el tamaño deseado */
    margin: 0 auto;
}
    </style>
    <section class="bg-white rounded-lg shadow-lg p-6 text-trueGray-900">
        <div class="flex items-center bg-gray-100 p-2 rounded-md">
            <div>
                <span class="bg-lese-900 rounded-md h-8 w-8 flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-white"></i>
                    {{-- <i class="fas fa-box"></i> --}}
                    {{-- <i class="fas fa-boxes-packing"></i> --}}
                    {{-- <i class="fas fa-box"></i> --}}
                </span>

            </div>
            <div class="items-center">
                @if (Cart::count())
                    <h1 class="text-xl font-bold ml-2"> Carrito de compras</h1>
                @else
                    <h1 class="text-xl font-bold ml-2"> Crea tu pedido</h1>
                @endif
                
            </div>

        </div>

        @if (Cart::count())
            <div class="overflow-x-auto">
                <table class="table-auto w-full mt-2">
                    <thead class=" w-full">
                        <tr class="flex justify-items-start w-full">
                            <th class="w-96"></th>
                            <th class="w-80">Precio</th>
                            <th class="w-48">Cant</th>
                            <th class="w-30">Total</th>
                        </tr>
                    </thead>
    
                    <tbody>
    
                        @foreach (Cart::content() as $item)
    
                            <tr class="flex items-center">
                                <td class="">
                                    <div class="flex w-96">
                                        <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                                        <div class="flex justify-center flex-col">
                                            <p class="font-bold text-sm">{{ $item->name }}</p>
                                            @php
                                                $colorName = App\Models\Color::where('id', $item->options->color_id)->first()->name ?? '';
                                                $sizeName = App\Models\Size::where('id', $item->options->size_id)->first()->name ?? '';
                                            @endphp
                                            
                                            @if ($item->options->color_id)
                                                <p class="text-xs capitalize">Color: {{ $colorName }}</p>                                            
                                            @endif
    
                                            @if ($item->options->size_id)
                                                <p class="text-xs capitalize">Medidas: {{ $sizeName }}</p>
                                            @endif
                                            {{-- <p class="text-xs uppercase">{{ $item->qty_available }}</p> --}}
    
                                            
                                        </div>
                                    </div>
                                </td>
                                <td class="flex items-center justify-center">
                                    <div class="flex justify-center items-center w-80">$ {{ number_format($item->price, 0, ',', '.')}}</div>    
                                </td>
                                <td class="">
                                    <div class="flex justify-center items-center w-48">
                                        @if ($item->options->size_id)
                                            @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))
                                        @elseif($item->options->color_id)
                                            @livewire('update-cart-item-color', ['rowId' => $item->rowId], key($item->rowId))
                                        @else
                                        @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                            
                                        @endif
                                    </div>
                                </td>
                                <td class="flex justify-center">
                                    <div class="text-center w-30 inline-flex">
                                        <span>$</span> <div>{{ number_format($item->price * $item->qty, 0, ',', '.')}}</div>
                                        
                                    </div>
                                </td>
                                <td class="items-center inline-flex ml-8">
                                    <a class=" cursor-pointer hover:text-greenLime-500 ml-2"
                                        wire:click="delete('{{ $item->rowId }}')"
                                        wire:loading.class="text-red-600 opacity-25"
                                        wire:target="delete('{{ $item->rowId }}')">
                                        <span
                                            class="bg-lese-900 rounded-md h-7 w-7 flex items-center justify-center cursor-pointer hover:bg-orange-800 hover:text-white">
                                            <i class="fas fa-trash-alt text-white"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
    
                        @endforeach
    
                    </tbody>
                </table>

            </div>

            <div class=" my-4 flex justify-between items-center bg-gray-100 p-4 rounded-md">
                <div class="items-center">
                    <p class="font-bold text-sm">Vaciar carrito <i class="fas fa-arrow-right pt-2 mx-2 text-lg text-greenLime-500"></i> </p>
                </div>
                <div>


                    {{-- <a class="text-sm cursor-pointer hover:underline mt-3 inline-block" 
                        wire:click="destroy">
                        <i class="fas fa-trash"></i>
                        Quitar todo
                    </a> --}}

                    <a class="bg-lese-900 rounded-md h-8 w-8 flex items-center justify-center cursor-pointer hover:bg-orange-800 hover:text-white"
                        wire:click="destroy">
                        <i class="fas fa-trash text-white"></i>
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
    @if($showJoggerModal)
        <x-jet-dialog-modal wire:model="open">
            <x-slot name="title" >
                <div class="flex justify-between items-center">
                    <h1 class="text-xl font-bold">PROMO! 😍</h1>                
                    <x-jet-secondary-button wire:click="$toggle('open')" wire:loading.attr="disabled">
                        x
                    </x-jet-secondary-button>
                </div>
            </x-slot>
            <x-slot name="content">
                <div class="flex flex-col items-center justify-center">
                    <div class="py-8 text-lg font-medium">
                        😎 Compra Jogger Mujer + Beisbolera en tan solo $100.000.                    
                        Agrega al carrito y disfruta de esta promoción. 😍
                    </div>
                    <img src="{{ asset('img/jogger.jpg') }}" alt="jogger promo">

                </div>
            </x-slot>
            <x-slot name="footer">
                
                <a class="bg-orange-600 rounded-lg text-white py-2 px-6 flex justify-center items-center"
                     href="{{ url('categorias/ropa?subcategoria=Jogger+deportivo+') }}">Ir a agregar</a>
            </x-slot>
        </x-jet-dialog-modal>
    @endif
    
</div>
