<div class="fixed bottom-4 right-4 {{ $whatsappNumber ? 'block' : 'hidden' }}">
    @if(!$showForm)
        <!-- Botón Flotante -->
        <button wire:click="$set('showForm', true)" class="bg-green-500 p-4 rounded-full">
            <x-whatsapp size="30px" color="#24352f"/>
        </button>
    @else
        <!-- Formulario Modal -->
        <div class="shadow-xl flex flex-col justify-center items-center p-6 rounded-lg" style="background-image: url({{ asset('img/fondo_whatsapp.png') }}); background-size: cover; background-position: center; z-index:9999;">
            <div class="flex justify-between items-center w-full mb-6">
                <div>
                    <x-whatsapp size="30px"/>
                    <span class="text-sm font-medium text-green-900">Escríbenos</span>
                </div>
                <button wire:click="$set('showForm', false)" class="bg-red-200 p-2 rounded-full shadow-xl h-6 w-6 flex justify-center items-center">
                    <i class="fas fa-times text-red-600"></i>
                </button>
            </div>

            <form wire:submit.prevent="submitForm">
                <div class="flex flex-col">
                    <label class="text-green-900 font-medium" for="name">Nombre Completo*</label>
                    <input class="form-control" type="text" id="name" wire:model="name">
                    @error('name') <small class="error text-red-600 font-thin">{{ $message }}</small> @enderror
                </div>
                <div class="flex flex-col">
                    <label  class="text-green-900 font-medium" for="phone">Número de Celular*</label>
                    <input class="form-control"  type="tel" id="phone" wire:model="phone">
                    @error('phone') <small class="error text-red-600 font-thin">{{ $message }}</small> @enderror
                </div>
                <button type="submit" class="bg-green-500 p-2 rounded mt-2 w-full">Enviar mensaje</button>
            </form>
        </div>
    @endif
</div>

