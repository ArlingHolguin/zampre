<div x-data>
    {{-- <div class="text-sm">Stock Disponible: <span>{{ $quantity }}</span> </div> --}}
    <div class="flex items-center gap-4">
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
            <x-jet-button class=" w-full flex justify-center">
                <i class="fas fa-shopping-cart"></i>
                <span class="ml-2">Agregar al carrito</span>
            </x-jet-button>
        </div>
    </div>
</div>
