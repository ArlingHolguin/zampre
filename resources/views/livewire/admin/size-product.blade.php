<div>
    <div class="mx-4 mt-4 rounded-lg bg-white px-4 py-4 shadow-lg md:mx-0 md:px-8">
        <div class="flex flex-col">
            <x-jet-label for="color" value="{{ __('Talla*') }}" />
               <input type="text" wire:model.defer="name" value="" placeholder="Ingresa el nombre de la talla" class="form-control w-full">
            <x-jet-input-error for="name"/>

        </div>

        

        {{-- boton de agregar  --}}
        <div class="flex items-center justify-end">            
            <div class="mt-4 flex items-center justify-end px-2">
                <x-jet-action-message class="mr-3" on="saved">
                    Agregado
                </x-jet-action-message>
                <x-jet-button class="" wire:loading.attr="disabled" wire:target="save"
                    wire:loading.class.remove="cursor-pointer" wire:click="save">
                    Agregar
                </x-jet-button>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <ul>
            @foreach ($sizes as $size)
                <li class="bg-white rounded shadow-lg p-6 mb-2" wire:key="size-{{ $size->id }}">
                    <div class="flex items-center">
                        <span class="text-lg font-medium">{{ $size->name }}</span>
                        <div class="ml-auto">
                            <x-jet-secondary-button class="ml-auto mr-2 bg-gray-600" wire:click="edit({{ $size->id }})"
                                wire:loading.attr="disabled" wire:target="edit({{ $size->id }})">
                                <i class="fas fa-edit text-green-200"></i>
                            </x-jet-secondary-button>
                            <x-jet-danger-button class="ml-auto mr-2" wire:click="$emit('deleteSize', {{ $size->id }})">
                                <i class="fas fa-trash"></i>
                            </x-jet-danger-button>
                        </div>
                    </div>
                    @livewire('admin.color-size', ['size' => $size], key('color-size-'.$size->id))
                </li>
                
            @endforeach
        </ul>
    </div>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">Editar talla/medida</x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="name_edit" value="{{ __('Nombre*') }}" />
                <x-jet-input placeholder="Ingrese el nombre" class="form-control mt-1 w-full" type="text"
                    wire:model.defer="name_edit" />
                <x-jet-input-error for="name_edit" class="mt-2" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

  
</div>
