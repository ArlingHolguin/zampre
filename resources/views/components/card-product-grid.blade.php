@props(['product'])
<li class="bg-white rounded-lg shadow-lg ">
    <article>
        <a href="{{ route('products.show', $product) }}">
        <figure>
            <img class="h-48 w-full md:w-56 object-cover object-center rounded-t-lg shadow-lg shadow-gray-100/50"
                src="{{ Storage::url($product->images->first()->url) ? Storage::url($product->images->first()->url) : '' }}"
                alt="{{ $product->name }}">
        </figure>
        <div class="py-4 px-6 text-gray-600">
            <p class="text-xs line-through ml-2">$ {{ number_format($product->price, 0, ',', '.') }}</p>
            <div>
                <span class="font-semibold text-xl ">$  {{ $product->price_discount ? number_format($product->price_discount, 0, ',', '.') : number_format($product->price, 0, ',', '.') }}</span>
                @if ($product->price_discount_percent)
                    <span class="text-green-600 font-semibold text-xs"> -{{ $product->price_discount_percent }} % OFF</span>
                @endif
                                        
            </div>
            <h1 class="text-md font-light">
                <div>{{ Str::limit($product->name, 20) }}</div>
            </h1>
            {{-- <span>{{ $product->subcategory->size ? 'Talla:true' : 'Talla:false' }}</span>
            <span>{{ $product->subcategory->color ? 'Color:true' : 'Color:false' }}</span> --}}
            @if ($product->free_shipping)
            <div class="flex items-center gap-1 mt-1">
                <i class="fas fa-bolt text-green-600"></i>
                <span class="text-xs font-medium text-green-600">Envío Gratis</span>
                
            </div>
            @endif
            
        </div>
    </a>
    </article>

</li>