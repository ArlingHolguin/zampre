<div>
    <div class="mx-4 mt-4 rounded-lg bg-gray-100 px-4 py-4 shadow-lg md:mx-0 md:px-8">
        {{-- Agregar Color --}}
        <div class="flex">
            <x-jet-button class="ml-auto" wire:click="showAddColorModal">Agregar Color Nuevo</x-jet-button>
        </div>
        <div class="flex flex-col gap-3">
            <x-jet-label for="color" value="{{ __('Color*') }}" />
            <div class="flex flex-wrap items-center gap-3">
                @foreach ($colors as $color)
                    <div class="flex items-center" wire:key="color-{{ $color->id }}">
                        <input type="radio" wire:model="color_id" value="{{ $color->id }}" id="color_{{ $color->id }}"
                            class="h-5 w-5 text-orange-600">
                        <label for="color_{{ $color->id }}" class="ml-2 text-sm text-gray-600">{{ $color->name }}</label>
                    </div>
                @endforeach
            </div>

            <x-jet-input-error for="color_id" class="mt-2" />

        </div>

        {{-- Cantidad  --}}
        <div class="mt-8 flex flex-col">
            <x-jet-label for="quantity" value="{{ __('Cantidad*') }}" />
            <x-jet-input placeholder="Ingrese la cantidad" class="form-control mt-1 w-full" type="number"
                wire:model.defer="quantity" />
            <x-jet-input-error for="quantity" class="mt-2" />

        </div>

        {{-- boton de agregar  --}}
        <div class="flex items-center justify-end">
            <div class="flex">
                <div wire:loading wire:target="save" class="ml-auto mr-4 font-black">
                    Agregando ....
                </div>
            </div>
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

    {{-- tabla --}}
    @if ($size_colors->count())
        <div class="mx-4 mt-4 rounded-lg bg-gray-100 px-4 py-4 shadow-lg md:mx-0 md:px-8">
            <table>
                <thead>
                    <tr>
                        <th class="w-1/3 px-4 py-2">Color</th>
                        <th class="w-1/3 px-4 py-2">Cantidad</th>
                        <th class="w-1/3 px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($size_colors as $size_color)
                        <tr wire:key="product_color-{{ $size_color->pivot->id }}">
                            <td class="px-4 py-2 capitalize">{{ $colors->find($size_color->pivot->color_id)->name }}</td>
                            <td class="px-4 py-2 capitalize">{{ $size_color->pivot->quantity }} unidades</td>
                            {{-- <td class="px-4 py-2 capitalize">{{ $size_color->pivot }} unidades</td> --}}
                            <td class="px-4 py-2 capitalize">
                                <x-jet-secondary-button class="ml-auto mr-2"
                                    wire:click="edit({{ $size_color->pivot->id }})" wire:loading.attr="disabled"
                                    wire:target="edit({{ $size_color->pivot->id }})">
                                    Editar
                                </x-jet-secondary-button>
                                <x-jet-danger-button class="ml-auto mr-2" wire:click="$emit('deleteColorSize', {{ $size_color->pivot->id }})">
                                    Eliminar
                                </x-jet-danger-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
    @endif

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar Colores
        </x-slot>
        <x-slot name="content">
            <div class="mb-4 flex flex-col">
                <x-jet-label for="" value="{{ __('Color*') }}" />
                <select class="form-control w-full" wire:model="pivot_color_id">
                    <option value="">Seleccione un color</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ ucfirst($color->name) }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="quantity" class="mt-2" />
            </div>

            <div class="flex flex-col">
                <x-jet-label for="quantity" value="{{ __('Cantidad*') }}" />
                <x-jet-input placeholder="Ingrese la cantidad" class="form-control mt-1 w-full" type="number"
                    wire:model="pivot_quantity" />
                <x-jet-input-error for="quantity" class="mt-2" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button wire:click="update" wire:loading.attr="disabled" wire:target="update" class="ml-4">
                Actualizar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="showAddColorModal">
        <x-slot name="title">
            Agregar Nuevo Color
        </x-slot>
        <x-slot name="content">
            <x-jet-label for="newColorName" value="Nombre del Color" />
            <x-jet-input id="newColorName" type="text" class="mt-1 block w-full" wire:model.defer="newColorName" />
            <x-jet-input-error for="newColorName" class="mt-2" />
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('showAddColorModal', false)">Cancelar</x-jet-secondary-button>
            <x-jet-button class="ml-3" 
                wire:click="saveNewColor"
                wire:loading.attr="disabled" wire:target="saveNewColor">
                Guardar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>