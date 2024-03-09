<div>
    <a href="{{route('shopping-cart')}}">
        <span class="relative inline-block cursor-pointer mt-2">
            {{-- icono cart --}}
            <x-cart size="35" />
             
            {{-- <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full"></span>                --}}

            @if (Cart::count())
            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-gray-800 transform translate-x-1/2 -translate-y-1/2 bg-greenLime-500 rounded-full">{{Cart::count()}}</span>   
            @else  
            <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-greenLime-500 rounded-full"></span>               
            @endif
            
            
        </span>

    </a>
    
</div>
