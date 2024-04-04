<div>
    <div class="flex items-center" x-data>
        <div class="mr-8 inline-flex">
            {{-- Boton restar --}}
            {{-- <x-jet-secondary-button
                class="border-lese-900 text-orange-600  mr-1 hover:text-trueGray-500" 
                disabled
                x-bind:disabled="$wire.qty <= 1" 
                wire:loading.attr="disabled" 
                wire:target="decrement"
                wire:click="decrement">
                <i class="fas fa-minus"></i>
            </x-jet-secondary-button> --}}

            {{-- Cantidad sumada o restada --}}
            <span class="text-lg text-trueGray-900 font-bold">{{ $qty }}</span>

            {{-- Boton sumar --}}
            {{-- <x-jet-secondary-button
                class="border-lese-900 text-orange-600 ml-1 hover:text-trueGray-500 "
                x-bind:disabled="$wire.qty >= $wire.quantity" 
                wire:loading.attr="disabled" 
                wire:target="increment"
                wire:click="increment">
                <i class="fas fa-plus "></i>
            </x-jet-secondary-button> --}}

        </div>
        
    </div>
</div>
