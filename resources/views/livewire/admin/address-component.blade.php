<div>
    <x-jet-form-section submit="save">
        <x-slot name="title">
            Agregar direccion de la tienda o bodega
        </x-slot>
        <x-slot name="description">
            Aquí podrás gestionar la dirección de la tienda o bodega.
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="departamento" value="Departamento*" />
                <x-jet-input id="departamento" type="text" class="mt-1 block w-full" wire:model.defer="departamento" />
                <x-jet-input-error for="departamento" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="ciudad" value="Ciudad*" />
                <x-jet-input id="ciudad" type="text" class="mt-1 block w-full" wire:model.defer="ciudad" />
                <x-jet-input-error for="ciudad" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="direccion" value="Dirección*" />
                <x-jet-input id="direccion" type="text" class="mt-1 block w-full" wire:model.defer="direccion" />
                <x-jet-input-error for="direccion" class="mt-2" />
            </div>
            
        </x-slot>
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                Actualizado.
            </x-jet-action-message>
            <x-jet-button>
                Guardar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

</div>
