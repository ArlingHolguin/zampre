<div>
    <x-jet-form-section submit="updateProfileContact">
        <x-slot name="title">
            {{ __('Perfil de contacto') }}
        </x-slot>
    
        <x-slot name="description">
            {{ __('Actualice la informacion de dirección y contacto') }}
        </x-slot>
    
        <x-slot name="form">
            
    
            <!-- Phone -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="phone" value="{{ __('Celular') }}" />
                <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="phone" autocomplete="phone" placeholder="Ej: 3124252525" />
                <x-jet-input-error for="phone" class="mt-2" />
            </div>    
            

            <!-- City-->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="city" value="{{ __('Ciudad') }}" />
                <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="city" placeholder="Ej: Bogotá"/>
                <x-jet-input-error for="city" class="mt-2" />
            </div>

            <!-- Address -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="address" value="{{ __('Dirección Completa') }}" />
                <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="address" placeholder="Ej: Cra 34 # 4b - 48 Local 401"/>
                <x-jet-input-error for="address" class="mt-2" />
            </div>

            {{-- empresa --}}
            {{-- <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="empresa" value="{{ __('Empresa') }}" />
                <x-jet-input id="empresa" type="text" class="mt-1 block w-full" wire:model.defer="empresa" placeholder="Ej: Mi empresa"/>
                <x-jet-input-error for="empresa" class="mt-2" />
            </div> --}}

            {{-- document_type --}}
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="document_type" value="{{ __('Tipo de documento') }}" />
                <select id="document_type" class="form-control w-full" wire:model.defer="document_type">
                    <option value=" ">Selecione una opción</option>
                    <option value="CC">Cédula de ciudadanía</option>
                    <option value="CE">Cédula de extranjería</option>
                    <option value="NIT">NIT</option>
                    <option value="TI">Tarjeta de identidad</option>
                    <option value="RUT">RUT</option>
                    <option value="PASS">Pasaporte</option>
                </select>
                <x-jet-input-error for="document_type" class="mt-2" />
            </div>

                {{-- document_number --}}
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="document_number" value="{{ __('Número de documento') }}" />
                    <x-jet-input id="document_number" type="text" class="mt-1 block w-full" wire:model.defer="document_number" placeholder="Ej: 123456789"/>
                    <x-jet-input-error for="document_number" class="mt-2" />
                </div>

        </x-slot>
    
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Guardado.') }}
            </x-jet-action-message>
    
            <x-jet-button wire:click="updateProfileContact" wire:loading.attr="disabled" wire:target="updateProfileContact">
                {{ __('Actualizar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
