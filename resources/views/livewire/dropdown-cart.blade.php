<div>
    <x-jet-dropdown width="96">
        <x-slot name="trigger">

            <span class="relative inline-block cursor-pointer mt-2">
                {{-- icono cart --}}
                <x-cart size="35" color="lese" />
                 
                {{-- <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full"></span>                --}}

                @if (Cart::count())
                <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-gray-800 transform translate-x-1/2 -translate-y-1/2 bg-greenLime-500 rounded-full">{{Cart::count()}}</span>   
                @else  
                <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-greenLime-500 rounded-full"></span>               
                @endif
                
                
            </span>
        </x-slot>
        <x-slot name="content">
            
            <ul class="overflow-y-auto h-64">
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4 rounded-md" src="{{ $item->options->image }}">

                        <article class="flex-1">
                            <p class="font-regular text-xs text-trueGray-800 uppercase">{{ $item->name }}</p>
                            <p class="font-bold text-xs text-trueGray-800 uppercase">{{ $item->options->referencia }}</p>

                            <div class="flex">
                                <p class="text-xs text-trueGray-800">Cant: <span class="font-bold">{{ $item->qty }}</span> </p>
                               

                            </div>

                            <p class="text-xs text-trueGray-800">$<span class="font-bold">{{ number_format($item->price) }}</span></p>
                        </article>
                    </li>

                @empty
                    <li>
                        <div class="py-6 px-4">
                            <p class="text-center text-gray-800 text-xs">No tiene agregado ningun item en el carrito</p>
                        </div>
                    </li>
                @endforelse
            </ul>
            @if (Cart::count())
                <div class="py-2 px-3">
                    <p class="text-md text-gray-700 font-bold mt-2 mb-3"><span class="font-bold">Total: </span>${{ Cart::subtotal() }}</p>
                     <x-danger-enlace href="{{route('shopping-cart')}}" class="w-full justify-center">
                        <span class=" font-medium hover:font-bold">Ver Pedido</span>
                     </x-danger-enlace>
         
                 

                </div>
            @endif
        
            

        </x-slot>
    </x-jet-dropdown>
</div>
