<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Marcas') }}
        </h2>
    </x-slot>
    <div class="container py-12">
        {{-- Formulario  --}}
        <x-jet-form-section submit="save">
            <x-slot name="title">
                Crear una nueva marca
            </x-slot>
            <x-slot name="description">
                Aquí puedes crear una nueva marca.
            </x-slot>
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="createForm.name" value="Nombre*" />
                    <x-jet-input id="createForm.name" type="text" class="mt-1 form-control w-full" wire:model="createForm.name" />
                    <x-jet-input-error for="createForm.name" class="mt-2" />
                </div>
            </x-slot>
            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    Marca Creada.
                </x-jet-action-message>
                <x-jet-button>
                    Crear
                </x-jet-button>
            </x-slot>


        </x-jet-form-section>

        {{-- lista de  marcas  --}}
        <x-jet-action-section class="mt-6">
            <x-slot name="title">
                Lista de marcas
            </x-slot>
            <x-slot name="description">
                Aqui encontrara todas las marcas creadas.
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
                    @foreach ($brands as $brand )
                       <tr>
                        <td class="py-2">
                            <div class="flex items-center gap-2">                                
                                <span class="text-sm font-medium uppercase">{{ $brand->name }}</span>    
                            </div>
                        </td>
                        <td class="py-2">
                            <div class="flex items-center divide-x-2 divide-gray-300">
                                <button wire:click="edit('{{ $brand->id }}')"  class="pr-2 font-semibold text-sm hover:text-blue-600">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a wire:click="$emit('deleteBrand', '{{ $brand->id }}')" class="pl-2 font-semibold text-sm hover:text-orange-600">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                        </tr> 
                    @endforeach
                </tbody>
              </table>  
            </x-slot>
        </x-jet-action-section>

        {{-- Modal de edición --}}
        <x-jet-dialog-modal wire:model="editForm.open">
            <x-slot name="title">
                Editar Marca
            </x-slot>
            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="editForm.name" value="Nombre*" />
                    <x-jet-input id="editForm.name" type="text" class="mt-1 form-control w-full" wire:model="editForm.name" />
                    <x-jet-input-error for="editForm.name" class="mt-2" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('editForm.open', false)" wire:loading.attr="disabled">
                    Cancelar
                </x-jet-secondary-button>
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled" wire.target="update">
                    Actualizar
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>

    @push('script')
    <script>
        Livewire.on('deleteBrand', brandId => {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.brand-component', 'delete', brandId);
                    }
                })
            });
    </script>
        
    @endpush
</div>
