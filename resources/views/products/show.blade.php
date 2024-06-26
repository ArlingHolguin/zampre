<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- FlexSlider img producto  --}}
            <div class="">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ( $product->images as $image)
                            <li data-thumb="{{ Storage::url($image->url) ? Storage::url($image->url) : '' }}">
                                <img src="{{ Storage::url($image->url) ? Storage::url($image->url) : ''  }}" alt="{{ $product->name}}"/>
                            </li> 
                        @endforeach
{{--                         
                        @forelse ($product->images as $image)
                            <li data-thumb="{{ Storage::url($image->url) ? Storage::url($image->url) : '' }}">
                                <img src="{{ $product->images->isNotEmpty() ? Storage::url($product->images->first()->url) : 'https://via.placeholder.com/150' }}" alt="{{ $product->name }}" />

                            </li>   
                        @empty    
                        <li data-thumb="https://via.placeholder.com/150">
                            <img src="https://via.placeholder.com/150" alt="No image available" />
                        </li>                  
                        @endforelse --}}
                     
                    </ul>
                  </div>
            </div>
            {{-- nombre descripcion  --}}
            <div class="text-gray-800">
                <h1 class="text-xl font-medium text-gray-800">{{ $product->name }}</h1>
                <div class="flex items-center gap-3">
                    <p class="text-sm">Marca: <a class="underline capitalize hover:text-orange-600 text-md" href="#">{{ $product->brand->name}}</a> </p>
                    <p>5 <i class="fas fa-star text-yellow-400"></i> </p>
                    <a class="text-orange-600 font-medium underline hover:text-orange-700" href="#">39 reseñas</a>
                </div>
                <p class="text-4xl font-bold text-gray-600 my-4">${{ $product->price_discount ? number_format($product->price_discount, 0, ',', '.') : number_format($product->price, 0, ',', '.')  }}</p>
                <div class="bg-white rounded-lg shadow-lg p-4 flex items-center gap-4">
                    <div class="flex items-center justify-center h-10 w-10 bg-greenLime-600 rounded-full">
                        <i class="fas fa-truck text-white"></i>
                    </div>
                    <div>
                        <p class="text-lg font- text-greenLime-600 font-semibold">Envíos a todo Colombia.</p>
                        @if ($product->free_shipping)
                            <div class="flex items-center gap-1 mt-1">
                                <i class="fas fa-bolt text-green-600"></i>
                                <span class="text-xs font-medium text-green-600">Envío Gratis</span>
                                
                            </div>
                            @endif
                    </div>
                </div>
                
                <div class="my-4">
                    @if ($product->subcategory->size)
                        @livewire('add-cart-items-size', ['product' => $product])
                    @elseif ($product->subcategory->color)
                        @livewire('add-cart-items-color', ['product' => $product])
                    @else
                        @livewire('add-cart-items', ['product' => $product])                        
                    @endif
                </div>
                <div class="mt-10">
                    <h2 class="text-lg font-semibold">Descripción</h2>
                    <p>{{ $product->description }}</p>
                </div>
                
            </div>

            
            

            
        </div>
    </div>
    @push('script')
        <script>
            // Can also be used with $(document).ready()
            $(document).ready(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
            });
        </script>

    @endpush

</x-app-layout>
