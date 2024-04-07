<div class="flex-1 relative" x-data>
    <form action="{{ route('search') }}" autocomplete="off">
        <x-jet-input class="w-full" name="name" wire:model="search" placeholder="Busca por nombre o categoría!" type="text" />
        <button class="absolute top-0 right-0 w-12 h-full bg-orange-400 flex items-center justify-center rounded-r-md">
            <x-search size="35" color="white" />
        </button>
    </form>
    <div class="absolute w-full mt-1 hidden" :class="{ 'hidden' : !$wire.open }" @click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="flex flex-col gap-y-2 overflow-y-scroll max-h-96">
                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="flex items-center gap-2 bg-white hover:bg-gray-100 px-3 mt-3" >
                        
                        @if($product->images->first())
                            <img class="w-16 h-16 object-cover rounded-md" src="{{ Storage::url($product->images->first()->url) }}" alt="{{$product->name}}">
                        @else
                            {{-- Puedes poner una imagen por defecto aquí --}}
                            <img class="w-16 h-16 object-cover rounded-md" src="{{ asset('path/to/default/image.png') }}" alt="Default Image">
                        @endif

                            <div class="text-gray-700 py-1">
                                <p class="text-lg font-medium">{{$product->name}}</p>
                                <p class="text-sm font-bold text-gray-600">${{ $product->price_discount ? number_format($product->price_discount, 0, ',', '.') : number_format($product->price, 0, ',', '.')  }}</p>
                                {{-- Acceder al nombre de la categoria del producto --}}
                                <span>{{ $product->subcategory->category->name }}</span>
                            </div>

                        
                    </a>
                    <div class="divider divider-orange-100"></div>
                @empty
                    <p class="text-lg leading-5 p-4">
                        <x-not-found-message>
                            No se encontraron productos con el nombre 👉 "{{ $search }}"
                        </x-not-found-message>
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
