<div>
    <div class="flex" x-data>
        <div class="mr-8">
            {{-- Boton restar --}}
            <x-jet-secondary-button
                class="bg-trueGray-900 text-lese-400 mr-1 hover:text-trueGray-50 hvr-grow hvr-icon-spin" disabled
                x-bind:disabled="$wire.qty <= 10" 
                wire:loading.attr="disabled" 
                wire:target="decrement"
                wire:click="decrement">
                <i class="fas fa-minus hvr-icon"></i>
            </x-jet-secondary-button>

            {{-- Cantidad sumada o restada --}}
            <span class="text-lg text-trueGray-900 font-bold">{{ $qty }}</span>

            {{-- Boton sumar --}}
            <x-jet-secondary-button
                class="bg-trueGray-900 text-lese-400 ml-1 hover:text-trueGray-50 hvr-grow hvr-icon-spin"
                x-bind:disabled="$wire.qty >= $wire.quantity" 
                wire:loading.attr="disabled" 
                wire:target="increment"
                wire:click="increment">
                <i class="fas fa-plus hvr-icon"></i>
            </x-jet-secondary-button>

        </div>
        
    </div>
</div>
