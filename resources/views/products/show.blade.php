<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- FlexSlider img producto  --}}
            <div class="">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img src="{{ Storage::url($image->url) }}" alt="{{ $product->name}}"/>
                            </li>                            
                        @endforeach
                     
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
                    <div class="flex items-center justify-center h-10 w-10 bg-greenLime-500 rounded-full">
                        <i class="fas fa-truck text-white"></i>
                    </div>
                    <div>
                        <p class="text-lg font- text-greenLime-500 font-semibold">Envíos a todo Colombia.</p>
                        <div class="text-sm">Recíbelo a partir del {{ Date::now()->addday(2)->locale('es')->format('l j F') }}.</div>
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
