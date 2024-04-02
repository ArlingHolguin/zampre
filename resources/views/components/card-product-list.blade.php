@props(['product'])
<div class="flex w-full bg-white shadow-lg rounded-lg">
    <div class="md:w-3/12 h-56 overflow-hidden rounded-l-lg border">
        <img src="{{ Storage::url($product->images->first()->url) }}"
        alt="{{ $product->name }}" class="w-full h-full object-cover">
    </div>
    <div class="w-9/12  border flex flex-col p-3 justify-between">
        <div>
            <div>{{ $product->name }}</div> 
            <p class="text-xs line-through ml-2">$ {{ number_format($product->price, 0, ',', '.') }}</p>
            <div>
                <span class="font-semibold text-xl ">$  {{ $product->price_discount ? number_format($product->price_discount, 0, ',', '.') : number_format($product->price, 0, ',', '.') }}</span>
                @if ($product->price_discount_percent)
                    <span class="text-green-600 font-semibold text-xs"> -{{ $product->price_discount_percent }} % OFF</span>
                @endif
            </div>
            
                @if ($product->free_shipping)
            <div class="flex items-center gap-1 mt-1">
                <i class="fas fa-bolt text-green-600"></i>
                <span class="text-xs font-medium text-green-600">Envío Gratis</span>
                
            </div>
            @endif
            <div class="mt-2">
             <div>{{ Str::limit($product->description, 60) }}</div> 
            </div>

        </div>
        <div class="flex justify-between">
            <div class="hidden md:flex items-center gap-3">
                <p class="text-sm">Marca: <a class="underline capitalize hover:text-orange-600 text-md" href="#">{{ $product->brand->name}}</a> </p>
                <p>5 <i class="fas fa-star text-yellow-400"></i> </p>
                <a class="text-orange-600 font-medium underline hover:text-orange-700" href="#">39 reseñas</a>
            </div>
            <a href="{{ route('products.show', $product) }}" class="bg-orange-600 px-8 py-1 text-white text-center rounded-md mt-2 hover:bg-orange-700">Ver Producto</a>
        </div>
    </div>
</div>