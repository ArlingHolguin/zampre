<div x-data>
    @if ($product->is_combo)
        
    @else
        <div class="text-sm">Stock Disponible: 
            <span>
                @if ($quantity > 0)
                    {{ $quantity }}
                    
                @else
                {{ $product->stock }}
                    
                @endif
            </span> 
        </div>        
        
        @endif
        <div>
            <span>Talla:</span>
            <select wire:model="size_id" class="form-control w-full">
                <option value="" selected disabled>Seleccione una talla</option>
                @foreach ($sizes as $size )
                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                @endforeach
            </select>
        </div>
        

    <div class="mt-4">
        <span>Color:</span>
        <select wire:model="color_id" class="form-control w-full">
            <option value="" selected disabled>Seleccione un color</option>
            @foreach ($colors as $color )
                <option class="capitalize" value="{{ $color->id }}">{{ $color->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-4">
        @if($product->is_combo)
            <div>
                @if($product->is_combo)
            <div>
                @if (!empty($comboTypes))
                    @foreach ($comboTypes as $group => $details)
                        <div>
                            <strong>{{ ucfirst($group) }}:</strong>
                            @foreach ($details['personas'] as $persona)
                                <div class="mt-4">
                                    <label>{{ $persona }} Tallas:</label>
                                    <select class="form-control w-full" wire:model="selectedSizes.{{ $group }}.{{ $persona }}">
                                        <option value="">Seleccione una talla</option>
                                        @foreach ($details['tallas'] as $size)
                                            <option value="{{ $size }}">{{ $size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @endif
            </div>
        @endif      

        </div>
         @endif
                 

    </div>
    @if (!empty($errorMessage))
    <div class="text-red-600">
        {{ $errorMessage }}
    </div>
@endif

    <div class="flex items-center gap-4 mt-8">
        <div>
            <x-jet-secondary-button
                disabled
                x-bind:disabled="$wire.qty <= 1"
                wire:loading.attr="disabled"
                wire:target="decrement"
                wire:click="decrement">

                <i class="fas fa-minus"></i>
            </x-jet-secondary-button>

            <span class="px-1">{{ $qty }}</span>

            <x-jet-secondary-button 
                x-bind:disabled="$wire.qty >= $wire.quantity"
                wire:loading.attr="disabled"
                wire:target="increment"
                wire:click="increment">

                <i class="fas fa-plus"></i>
            </x-jet-secondary-button>
        </div>
        <div class="flex-1">
            <x-jet-button x-bind:disabled="!$wire.quantity"
                wire:click="addItem" 
                wire:loading.attr="disabled"
                wire:target="addItem"
                class=" w-full flex justify-center">
                <i class="fas fa-shopping-cart"></i>
                <span class="ml-2">Agregar al carrito</span>
            </x-jet-button>
        </div>
    </div>
</div>
