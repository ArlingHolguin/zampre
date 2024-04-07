<div>
    <x-jet-form-section submit="save">
        <x-slot name="title">
            Agregar redes sociales
        </x-slot>
        <x-slot name="description">
            Aquí podrás gestionar las cuentas de redes sociales de tu tienda.
        </x-slot>
        <x-slot name="form">
            <!-- Pestañas para redes sociales -->
            <div class=" space-y-8 col-span-6">
                <ul class="flex">
                    <li class="-mb-px mr-1 cursor-pointer rounded-lg border-2  {{ $selectedTab == 'instagram' ? 'border-green-600 bg-gray-200' :'border-gray-700 bg-white' }}" wire:click="setTab('instagram')">
                        <a class=" inline-block py-2 px-4 font-semibold">
                            <x-instagram color="#E1306C" size="30px"/> Instagram
                        </a>
                    </li>
                    <li class="mr-1 cursor-pointer rounded-lg border-2 {{ $selectedTab == 'facebook' ? 'border-green-600 bg-gray-200' :'border-gray-700 bg-white' }}"wire:click="setTab('facebook')">
                        <a class="inline-block py-2 px-4 font-semibold">
                            <x-facebook color="#3b5998" size="30px"/> Facebook
                        </a>
                    </li>
                    <li class="mr-1 cursor-pointer rounded-lg border-2 {{ $selectedTab == 'whatsapp' ? 'border-green-600 bg-gray-200' :'border-gray-700 bg-white' }}" wire:click="setTab('whatsapp')">
                        <a class="inline-block py-2 px-4 font-semibold">
                            <x-whatsapp color="#075E54" size="30px"/> WhatsApp
                        </a>
                    </li>
                </ul>
                
                <div class=" mt-10">
                    <!-- Contenido de cada pestaña -->
                        @if ($selectedTab == 'instagram')
                        <div class="mt-4 " wire:key="instagram-content">
                            <div class="">
                                <x-jet-label for="instagramUrl" value="Cuenta de Instagram*" />
                                <x-jet-input id="instagramUrl" type="url" class="mt-1 block w-full" wire:model.defer="instagramUrl" />
                                <x-jet-input-error for="instagramUrl" class="mt-2" />
                            </div>
                        </div>
                        <!-- Campos para Instagram -->
                    @elseif ($selectedTab == 'facebook')
                        <div class="mt-4" wire:key="facebook-content">
                            <div class="">
                                <x-jet-label for="facebookUrl" value="Cuenta de Facebook*" />
                                <x-jet-input id="facebookUrl" type="url" class="mt-1 block w-full" wire:model.defer="facebookUrl" />
                                <x-jet-input-error for="facebookUrl" class="mt-2" />
                            </div>
                        </div>
                        <!-- Campos para Facebook -->
                    @elseif ($selectedTab == 'whatsapp')
                        <div class="mt-4" wire:key="whatsapp-content">
                            <div class="">
                                <x-jet-label for="whatsappUrl" value="Número de WhatsApp*" />
                                <x-jet-input id="whatsappUrl" type="tel" class="mt-1 block w-full" wire:model.defer="whatsappUrl" />
                                <x-jet-input-error for="whatsappUrl" class="mt-2" />
                            </div>
                        </div>
                    @endif
                </div>

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
