<div>
    {{-- tarjeta filter --}}
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <div class="flex items-center justify-center">
                <span class="bg-lese-400 rounded-lg h-10 w-10 flex items-center justify-center">
                    <img src="{{ asset('img/' . $category->icon . '.png') }}" width="50" alt="Icono de {{ $category->name }}">
                </span>
                <h1 class="ml-2 font-bold text-black uppercase">
                    {{ $category->name }}
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full font-black">{{ $category->productsRelacionados->count() }}</span>
                </h1>

            </div>

            <div class="grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-trueGray-700">
                <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-lese-400 bg-orange-600' : '' }}"
                    wire:click="$set('view', 'grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-lese-400 bg-orange-600' : '' }}"
                    wire:click="$set('view', 'list')"></i>
            </div>

        </div>
    </div>
    {{-- grid 5 columnas --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <aside>
            <button wire:click="$toggle('freeShipping')" 
            class="{{ $freeShipping ? 'text-orange-600 font-bold' : 'text-gray-700' }} hover:text-orange-700 font-medium hover:underline mb-2">
            <i class="fas fa-bolt {{  $freeShipping ? 'text-orange-600': '' }}"></i> Envío Gratis
            </button>

            <div class="font-bold text-left capitalize mb-2">Precio</div>
            <button wire:click="sortByPrice('precio_asc')" class="{{ $sortPrice == 'precio_asc' ? 'text-orange-600 font-bold' : 'text-gray-700' }} hover:text-orange-700 font-medium hover:underline">Menor precio</button><br>
             <button wire:click="sortByPrice('precio_desc')" class="{{ $sortPrice == 'precio_desc' ? 'text-orange-600 font-bold' : 'text-gray-700' }} hover:text-orange-700 font-medium hover:underline mb-4">Mayor precio</button>
            <ul class="">
                <h2 class="font-bold text-left capitalize mb-2">Subcategorias</h2>
                @foreach ($category->subcategories as $subcategory)
                   <li wire:click="$set('subcategoria', '{{ $subcategory->name }}')" class=" {{ $subcategoria == $subcategory->name ? 'text-orange-600 font-bold' : '' }}cursor-pointer text-gray-700 hover:text-orange-700 font-medium hover:underline capitalize mb-1">                   
                        {{ $subcategory->name }}
                        @if ($subcategory->products)
                            <span class="text-xs">({{ $subcategory->products->count() }})</span>
                        @endif
                   </li>

                @endforeach
            </ul>

            <ul class="mt-4">
                <div class="font-bold text-left capitalize mb-2">Marcas</div>
                @foreach ($category->brands as $brand)
                    @if ($brand->status == 2)
                    <li wire:click="$set('marca', '{{ $brand->name }}')" class=" {{ $marca == $brand->name ? 'text-orange-600 font-bold' : '' }}cursor-pointer text-gray-700 hover:text-orange-700 font-medium hover:underline capitalize mb-1">
                        {{ $brand->name }}
                    </li>
                    
                    @endif

                @endforeach
            </ul>
            
           
            <x-jet-button class="mt-4 bg-gray-700 text-white hover:text-lese-400 hover:bg-gray-900"
                wire:click="limpiar">
                <i class="far fa-trash-alt mr-1"></i> Quitar Filtro
            </x-jet-button>
        </aside>

        <div class="md:col-span-2 lg:col-span-4">
            <div class="mb-4">
                {{ $products->links() }}
            </div>
            @if ($view == 'grid')
                <ul class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product )
                        <div>
                            <x-card-product-grid :product="$product" />
                        </div>
                    @endforeach
                </ul>
            @else
            <ul class="grid grid-cols-1 gap-y-4">
                @foreach ($products as $product )
                    <div>
                        <x-card-product-list :product="$product" />
                    </div>
                @endforeach
            </ul>

            @endif

            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
