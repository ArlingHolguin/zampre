<div>
    <x-jet-form-section submit="save">
        <x-slot name="title">
            Agregar datos de contacto
        </x-slot>
        <x-slot name="description">
            Aquí podrás gestionar datos de contacto. Debe configurar el email obligatoriamente para notificaciones de los pedidos o si no no tevan llegar los correos.
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="celular" value="Celular*" />
                <x-jet-input id="celular" type="text" class="mt-1 block w-full" wire:model.defer="celular" placeholder="Ingrese su número de celular"/>
                <x-jet-input-error for="celular" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="email" value="Email de la tienda*" />
                <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model.defer="email" placeholder="Ingrese email de la tiendar"/>
                <x-jet-input-error for="email" class="mt-2" />
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
