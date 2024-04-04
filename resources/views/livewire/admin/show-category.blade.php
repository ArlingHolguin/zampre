<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de subcategorias') }}
        </h2>
    </x-slot>
    <div class="container py-12">
        {{-- formulario de creación de subcategorias --}}
        <x-jet-form-section submit="save">
            <x-slot name="title">
                Crear una nueva subcategoría
            </x-slot>
            <x-slot name="description">
                Aquí puedes crear una nueva subcategoría.
            </x-slot>
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="createForm.name" value="Nombre*" />
                    <x-jet-input id="createForm.name" type="text" class="mt-1 form-control w-full" wire:model="createForm.name" />
                    <x-jet-input-error for="createForm.name" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="createForm.slug" value="Slug*" />
                    <x-jet-input id="createForm.slug" type="text" class="mt-1 form-control w-full cursor-not-allowed bg-gray-100" wire:model="createForm.slug" disabled />
                    <x-jet-input-error for="createForm.slug" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="createForm.extracto" value="Extracto" />
                    <x-jet-input id="createForm.extracto" type="text" class="mt-1 form-control w-full" wire:model="createForm.extracto" />
                    <x-jet-input-error for="createForm.extracto" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="createForm.keywords" value="Keywords" />
                    <x-jet-input id="createForm.keywords" name="keywords[]"  type="text" class="mt-1 form-control w-full" wire:model="createForm.keywords" />
                    <x-jet-input-error for="createForm.extract" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <div class="flex items-center border p-1 rounded-md shadow-lg">
                        <p class="text-sm">¿Esta subcategoría necesita especificar color?</p>
                        <div class="ml-auto">
                            {{-- {{ $createForm['size'] }} --}}
                            <div x-data="{ value: @entangle('createForm.color').defer }">
                                <div class="flex items-center m-2 cursor-pointer cm-toggle-wrapper" x-on:click="value = (value == '1' ? '0' : '1'); $wire.toggleColor(value);">
                                    <span class="font-semibold text-sm mr-1">No</span>
                                    <div class="flex items-center justify-center rounded-full w-10 h-6 p-0.5 bg-gray-300" :class="{ 'bg-red-600': value == '0', 'bg-green-600': value == '1' }">
                                        <div class="rounded-full w-5 h-5 bg-white transform mx-auto duration-300 ease-in-out" :class="{ '-translate-x-2': value == '0', 'translate-x-2': value == '1' }"></div>
                                    </div>
                                    <span class="font-semibold ml-1">Si</span>
                                </div>
                            </div>
                            <x-jet-input-error for="createForm.color" class="mt-2" />
                            
                        </div>
                    </div>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <div class="flex items-center border p-1 rounded-md shadow-lg">
                        <p class="text-sm">¿Esta subcategoría necesita especificar talla/medida?</p>
                        <div class="ml-auto">
                            {{-- {{ $createForm['color'] }} --}}
                            <div x-data="{ value: @entangle('createForm.size').defer }">
                                <div class="flex items-center m-2 cursor-pointer cm-toggle-wrapper" x-on:click="value = (value == '1' ? '0' : '1'); $wire.toggleSize(value);">
                                    <span class="font-semibold text-sm mr-1">No</span>
                                    <div class="flex items-center justify-center rounded-full w-10 h-6 p-0.5 bg-gray-300" :class="{ 'bg-red-600': value == '0', 'bg-green-600': value == '1' }">
                                        <div class="rounded-full w-5 h-5 bg-white transform mx-auto duration-300 ease-in-out" :class="{ '-translate-x-2': value == '0', 'translate-x-2': value == '1' }"></div>
                                    </div>
                                    <span class="font-semibold ml-1">Si</span>
                                </div>
                            </div>
                            <x-jet-input-error for="createForm.size" class="mt-2" />

                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    Categoría Creada.
                </x-jet-action-message>
                <x-jet-button>
                    Crear
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
        {{-- tabla de subcategorias --}}
        <x-jet-action-section class="mt-6">
            <x-slot name="title">
                Lista de subcategorias
            </x-slot>
            <x-slot name="description">
                Aqui encontrara todas las subcategorias creadas.
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
                    @foreach ($subcategories as $subcategory )
                       <tr>
                        <td class="py-2">
                            <div class="flex items-center gap-2">                                
                                <span class="text-sm font-medium uppercase">{{ $subcategory->name }}</span>    
                            </div>
                        </td>
                        <td class="py-2">
                            <div class="flex items-center divide-x-2 divide-gray-300">
                                <button wire:click="edit('{{ $subcategory->id }}')"  class="pr-2 font-semibold text-sm hover:text-blue-600">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a wire:click="$emit('deleteSubcategory', '{{ $subcategory->id }}')" class="pl-2 font-semibold text-sm hover:text-orange-600">
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

        {{-- modal editar subcategoria --}}
        {{-- modal  --}}
        <x-jet-dialog-modal wire:model="editForm.open">
            <x-slot name="title">
                Editar Subcategoría
            </x-slot>
            <x-slot name="content">
                <div class="space-y-3">
                    <div>
                        <x-jet-label for="editForm.name" value="Nombre*" />
                        <x-jet-input id="editForm.name" type="text" class="mt-1 form-control w-full" wire:model="editForm.name" />
                        <x-jet-input-error for="editForm.name" class="mt-2" />
                    </div>
                    <div>
                        <x-jet-label for="editForm.slug" value="Slug*" />
                        <x-jet-input id="editForm.slug" type="text" class="mt-1 form-control w-full cursor-not-allowed bg-gray-100" wire:model="editForm.slug" disabled />
                        <x-jet-input-error for="editForm.slug" class="mt-2" />
                    </div>
                    <div>
                        <x-jet-label for="editForm.extracto" value="Extracto" />
                        <x-jet-input id="editForm.extracto" type="text" class="mt-1 form-control w-full" wire:model="editForm.extracto" />
                        <x-jet-input-error for="editForm.extracto" class="mt-2" />
                    </div>
                    <div>
                        <x-jet-label for="editForm.keywords" value="Keywords" />
                        <x-jet-input id="editForm.keywords" name="keywords[]"  type="text" class="mt-1 form-control w-full" wire:model="editForm.keywords" />
                        <x-jet-input-error for="editForm.extract" class="mt-2" />
                    </div>
                    {{-- color --}}
                    <div>
                        <div class="flex items-center border p-1 rounded-md shadow-lg">
                            <p class="text-sm">¿Esta subcategoría necesita especificar color?</p>
                            <div class="ml-auto">
                                {{-- {{ $createForm['size'] }} --}}
                                <div x-data="{ value: @entangle('editForm.color').defer }">
                                    <div class="flex items-center m-2 cursor-pointer cm-toggle-wrapper" x-on:click="value = (value == '1' ? '0' : '1'); $wire.toggleColor(value);">
                                        <span class="font-semibold text-sm mr-1">No</span>
                                        <div class="flex items-center justify-center rounded-full w-10 h-6 p-0.5 bg-gray-300" :class="{ 'bg-red-600': value == '0', 'bg-green-600': value == '1' }">
                                            <div class="rounded-full w-5 h-5 bg-white transform mx-auto duration-300 ease-in-out" :class="{ '-translate-x-2': value == '0', 'translate-x-2': value == '1' }"></div>
                                        </div>
                                        <span class="font-semibold ml-1">Si</span>
                                    </div>
                                </div>
                                <x-jet-input-error for="createForm.color" class="mt-2" />
                                
                            </div>
                        </div>
                    </div>
                    {{-- size --}}
                    <div>
                        <div class="flex items-center border p-1 rounded-md shadow-lg">
                            <p class="text-sm">¿Esta subcategoría necesita especificar talla/medida?</p>
                            <div class="ml-auto">
                                {{-- {{ $createForm['color'] }} --}}
                                <div x-data="{ value: @entangle('editForm.size').defer }">
                                    <div class="flex items-center m-2 cursor-pointer cm-toggle-wrapper" x-on:click="value = (value == '1' ? '0' : '1'); $wire.toggleSize(value);">
                                        <span class="font-semibold text-sm mr-1">No</span>
                                        <div class="flex items-center justify-center rounded-full w-10 h-6 p-0.5 bg-gray-300" :class="{ 'bg-red-600': value == '0', 'bg-green-600': value == '1' }">
                                            <div class="rounded-full w-5 h-5 bg-white transform mx-auto duration-300 ease-in-out" :class="{ '-translate-x-2': value == '0', 'translate-x-2': value == '1' }"></div>
                                        </div>
                                        <span class="font-semibold ml-1">Si</span>
                                    </div>
                                </div>
                                <x-jet-input-error for="createForm.size" class="mt-2" />
    
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-button wire:click="update" wire:loading.attr="disabled" wire.target="update">
                    Actualizar
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>

        
    </div>
    @push('script')
    <script>
        Livewire.on('deleteSubcategory', subcategoryId => {
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
                        Livewire.emitTo('admin.show-category', 'delete', subcategoryId);
                    }
                })
            });
    </script>
        
    @endpush
</div>
