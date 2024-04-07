<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajustes y configuraciones.') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8 space-y-8">
        {{-- banner --}}
    <x-jet-form-section submit="save">
        <x-slot name="title">
            Agregar items al banner
        </x-slot>
        <x-slot name="description">
            Aquí poodras gestionar las piezas del banner de la página de inicio.
        </x-slot>
        <x-slot name="form">
            {{-- Campo para el nombre del banner --}}
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="banner_name" value="Nombre del Banner*" />
                <x-jet-input id="banner_name" type="text" class="mt-1 block w-full" wire:model.defer="banner_name" />
                <x-jet-input-error for="banner_name" class="mt-2" />
            </div>

            {{-- Campo para la URL de la imagen --}}
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label class="mb-4" for="banner_image" value="Imagen del Banner Dimensiones(1200px300px)**" />
                <x-jet-input id="{{ $rand }}" type="file" class="mt-1 block w-full" wire:model="banner_image" accept="image/jpeg,image/png" />
                <x-jet-input-error for="banner_image" class="mt-2" />
                @if ($banner_image)
                <div class="mt-2">
                    <img src="{{ $banner_image->temporaryUrl() }}" width="1360" height="350">
                </div>
                
                @endif
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                Item agregado.
            </x-jet-action-message>
            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
    {{-- tabla de items del banner --}}
    <x-jet-action-section class="mt-6">
        <x-slot name="title">
            Items del banner
        </x-slot>
        <x-slot name="description">
            Aqui encontrará todos los ítems creados para el banner.
        </x-slot>
        <x-slot name="content">
        <table>
            <thead class="border-b border-gray-300">
                <tr class="text-left">
                    <th class="py-2 w-full">Nombre</th>
                    <th class="py-2">Acción</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300">
                @foreach ($items as $item)
                <tr>
                    <td class="py-2">
                        {{ $item['name'] }}
                        <img class="object-cover object-center h-8 w-20" src="{{ Storage::url($item['image']) }}" width="100" alt="{{ $item['name'] }}" />
                    </td>
                    <td class="py-2">
                        <a wire:click="deleteBanner('{{ $item['image'] }}')" class="cursor-pointer text-red-600 hover:text-red-800">
                            Eliminar
                        </a>
                    </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>  
        </x-slot>
    </x-jet-action-section>

     {{-- contactto  --}}
    @livewire('admin.contact-component')

    {{-- address  --}}
    @livewire('admin.address-component')
    {{-- Social --}}
    @livewire('admin.social-component')

    
</div>
</div>
