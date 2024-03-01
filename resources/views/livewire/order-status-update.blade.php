<div>
    {{-- card cambiar estado de la orden --}}
    <div class="mt-2 bg-gray-50 p-2 rounded-md ">
        <div class=" flex justify-between items-center">
            <div class=" flex items-center container  py-2">

                <span class="bg-trueGray-800 rounded-md h-6 w-6 flex items-center justify-center">
                    <i class="fas fa-box-open text-sm text-lese-400"></i>
                </span>

                <p class="text-trueGray-800 ml-2"><span
                        class="font-bold text-trueGray-900">{{ $orden->code_id }}</span>
                

                    @switch($orden)
                        @case($orden->status == 1)
                            <div class="bg-gray-300 py-1 px-8  font-bold uppercase ml-2 rounded-lg items-center justify-center shadow-md"
                                style="font-size: 10px;">Pendiente</div>
                        @break

                        @case($orden->status == 2)
                            <div class="bg-blue-500 py-1 px-8  font-bold uppercase ml-2 rounded-lg items-center justify-center shadow-md text-white"
                                style="font-size: 10px;">Recibido</div>
                        @break

                        @case($orden->status == 3)
                            <div class="flex bg-greenLime-500 py-1 px-8  font-bold uppercase ml-2 rounded-lg items-center justify-center shadow-md text-white"
                                style="font-size: 10px;">Enviado</div>
                        @break

                        @case($orden->status == 4)
                            <div class="bg-green-600 py-1 px-8  font-bold uppercase ml-2 rounded-lg items-center justify-center shadow-md text-white"
                                style="font-size: 10px;">Entregado</div>
                        @break

                        @default
                            <div class="bg-gray-300 py-1 px-8  font-bold uppercase ml-2 rounded-lg items-center justify-center shadow-md"
                                style="font-size: 10px;">Anulado</div>
                    @endswitch
                </div>
                </p>


            

            <div class="mr-2">

                <x-jet-button class="text-lese-900">
                    Actualizar
                </x-jet-button>
            </div>
        </div>{{-- card cambiar estado de la orden --}}
        <div class="py-4 px-8">
            {{ $orden->status }}
        </div>
    </div>
</div>
