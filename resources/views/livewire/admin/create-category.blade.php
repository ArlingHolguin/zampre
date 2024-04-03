<div>
    <x-jet-form-section submit="save">
        <x-slot name="title">
            Crear una nueva categoría
        </x-slot>
        <x-slot name="description">
            Aquí puedes crear una nueva categoría.
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
                <x-jet-label for="createForm.extract" value="Extracto" />
                <x-jet-input id="createForm.extract" type="text" class="mt-1 form-control w-full" wire:model="createForm.extract" />
                <x-jet-input-error for="createForm.extract" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="createForm.keywords" value="Keywords" />
                <x-jet-input id="createForm.keywords" name="keywords[]"  type="text" class="mt-1 form-control w-full" wire:model="createForm.keywords" />
                <x-jet-input-error for="createForm.extract" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="createForm.icon" value="Icon png 48px*" />
                <x-jet-input wire:model="createForm.icon" id="{{ $rand }}"  type="file" accept="image/png" class="mt-1 form-control w-full" />
                <x-jet-input-error for="createForm.icon" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="brands" value="Marcas*" />
                <div class="grid grid-cols-4">
                    @foreach ($brands as $brand)
                      <x-jet-label>
                        <x-jet-checkbox class="" wire:model="createForm.brands" name="brands[]" value="{{ $brand->id }}"/>
                        {{ $brand->name }}
                    </x-jet-label>  
                    @endforeach
                </div>
                <x-jet-input-error for="createForm.brands" class="mt-2" />
            </div>

            {{-- <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="createForm.image" value="Imagen*" />
                <x-jet-input wire:model="createForm.image"  type="file" accept="image/*" class="mt-1 form-control w-full" />
                <x-jet-input-error for="createForm.image" class="mt-2" />
            </div> --}}
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

    <x-jet-action-section class="mt-6">
        <x-slot name="title">
            Lista de categorias
        </x-slot>
        <x-slot name="description">
            Aqui encontrara todas las categorias creadas.
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
                @foreach ($categories as $category )
                   <tr>
                    <td class="py-2">
                        <div class="flex items-center gap-2">
                            <img class="w-10 object-fill object-center" src="{{ Storage::url($category->icon) ? Storage::url($category->icon) : ''  }}" alt="{{ $category->name}}"/>
                            <a href="{{ route('admin.categories.show', $category) }}" class="text-sm font-medium uppercase underline hover:text-orange-600">{{ $category->name }}</a>

                        </div>
                    </td>
                    <td class="py-2">
                        <div class="flex items-center divide-x-2 divide-gray-300">
                            <button wire:click="edit('{{ $category->slug }}')"  class="pr-2 font-semibold text-sm hover:text-blue-600">
                                <i class="fas fa-edit"></i>
                            </button>
                            <a wire:click="$emit('deleteCategory', '{{ $category->slug }}')" class="pl-2 font-semibold text-sm hover:text-orange-600">
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

    {{-- modal  --}}
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar categoría
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
                    <x-jet-label for="editForm.extract" value="Extracto" />
                    <x-jet-input id="editForm.extract" type="text" class="mt-1 form-control w-full" wire:model="editForm.extract" />
                    <x-jet-input-error for="editForm.extract" class="mt-2" />
                </div>
                <div>
                    <x-jet-label for="editForm.keywords" value="Keywords" />
                    <x-jet-input id="editForm.keywords" name="keywords[]"  type="text" class="mt-1 form-control w-full" wire:model="editForm.keywords" />
                    <x-jet-input-error for="editForm.extract" class="mt-2" />
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <x-jet-label for="editIcon" value="Icon png 48px*" />
                        <x-jet-input wire:model="editIcon" id="{{ $rand }}"  type="file" accept="image/png" class="mt-1 form-control w-full" />
                        <x-jet-input-error for="editIcon" class="mt-2" />
                    </div>
                    <div class="w-12 h-12 border mt-2 flex items-center justify-center">
                        @if ($editIcon)
                        <img src="{{ $editIcon->temporaryUrl()}}" alt="icon">  
                            
                        @else
                        <img src="{{ Storage::url($editForm['icon']) }}" alt="icon">  
                            
                        @endif
                    </div>
                </div>
                <div>
                    <x-jet-label for="brands" value="Marcas*" />
                    <div class="grid grid-cols-4">
                        @foreach ($brands as $brand)
                          <x-jet-label>
                            <x-jet-checkbox class="" wire:model="editForm.brands" name="brands[]" value="{{ $brand->id }}"/>
                            {{ $brand->name }}
                        </x-jet-label>  
                        @endforeach
                    </div>
                    <x-jet-input-error for="editForm.brands" class="mt-2" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:click="update" wire:loading.attr="disabled" wire.target="editIcon, update">
                Actualizar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
