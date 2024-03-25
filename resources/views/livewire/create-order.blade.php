<div>
    {{-- Titulo --}}
    <div class="sticky top-16 z-40 bg-lese-100">
        <div class="container flex items-center py-2">
            {{-- icono --}}
            <span class="flex h-8 w-8 items-center justify-center rounded-md bg-orange-600">
                <i class="fas fa-box-open text-xl text-white"></i>
            </span>
            {{-- end icono --}}
            <p class="mx-2 text-xl font-black uppercase text-trueGray-600">Datos de envío </p>
        </div>

    </div>
    {{-- End Titulo --}}

    <div class="container grid grid-cols-5 gap-6 py-8">
        <div class="col-span-3">
            <div class="rounded-lg bg-white p-4 pb-5 shadow-md">
                {{-- Nombre Contacto --}}
                <div class="mb-4">
                    <x-jet-label value="Nombre de contacto" />
                    <x-jet-input type="text" placeholder="Nombre de la persona que recibe el producto"
                        class="form-control w-full focus:border-lese-200" wire:model.defer="contact" />
                    <x-jet-input-error for="contact" />
                </div>

                <div class="mb-4">
                    <x-jet-label value="Número de identificación" />
                    <x-jet-input type="text"
                        placeholder="Número de identificación sin comas, ni espacios ej: 1234567890"
                        class="form-control w-full focus:border-lese-200" wire:model.defer="identification" />
                    <x-jet-input-error for="identification" />
                </div>

                {{-- Telefono Contacto --}}
                <div>
                    <x-jet-label value="Celular" />
                    <x-jet-input type="text" placeholder="Número de celular sin comas, ni espacios ej: 3124536767 "
                        class="form-control w-full" wire:model.defer="phone" />
                    <x-jet-input-error for="phone" />
                </div>
            </div>
            <div x-data="{ envio_type: @entangle('envio_type') }">

                <p class="mb-3 mt-6 text-lg font-semibold text-trueGray-800">Envíos</p>
                {{-- Tarjeta de envios --}}
                <div class="rounded-lg bg-white shadow-md">
                    <label class="mb-4 flex cursor-pointer items-center justify-between px-6 py-4">

                        <!-- toggle -->
                        <div class="relative">
                            <input id="toogleButton" name="envio_type" value="1" type="radio" class="hidden"
                                x-model="envio_type" />
                            <!-- path -->
                            <div class="toggle-path h-5 w-9 cursor-pointer rounded-full bg-gray-200 shadow-inner"></div>
                            <!-- crcle -->
                            <div class="toggle-circle absolute inset-y-0 left-0 h-3.5 w-3.5 cursor-pointer rounded-full bg-white shadow">
                            </div>
                        </div>
                        <span class="ml-2 mr-auto font-medium">
                            Recibo en agencia de envios
                        </span>
                        <!-- end toggle -->


                        <div class="ml-2 font-semibold text-trueGray-800">
                            <span
                                class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-md bg-trueGray-800 text-greenLime-400 hover:text-greenLime-50">
                                <img src="{{ asset('vendor/icons/producto.gif') }}" alt="Card">
                                {{-- <i class="fas fa-gift text-lg "></i> --}}
                            </span>
                        </div>
                    </label>
                    <div class="mb-4 grid grid-cols-2 gap-6 px-6 pb-6" :class="{ 'hidden': envio_type != 1 }">
                        {{-- departamento --}}
                        <div>

                            <x-jet-label value="Departamento***" />
                            {{-- {{ $departamento_id }} --}}
                            <select class="form-control w-full" wire:model="departamento_id" :disabled="$isLoading">
                                <option value="" disabled selected>Seleccione el departamento</option>
                                @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}">{{ $departamento->name }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="departamento_id" />
                        </div> {{-- Fin departamentos --}}

                        {{-- Ciudades --}}
                        <div>
                            {{-- {{ $municipio_id }} --}}
                            <x-jet-label value="Ciudad o Municipio**" />
                            <select class="form-control w-full" wire:model="municipio_id" :disabled="$isLoading">
                                <option value="" disabled selected>Seleccione Ciudad o Municipio</option>
                                @foreach ($municipios as $municipio)
                                    <option value="{{ $municipio->id }}">
                                        {{ $municipio->name . ' - ' . $municipio->code }}
                                    </option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="municipio_id" />
                        </div> {{-- Fin Ciudades --}}

                        {{-- referencia --}}
                        <div class="col-span-2">
                            <x-jet-label value="Oficina y/o dirección" />
                            <x-jet-input type="text" wire:model="references" class="form-control w-full"
                                placeholder="Nombre de la agencia y/o dirección" />
                            <x-jet-input-error for="references" />

                        </div> {{-- end referencia --}}
                    </div>
                </div>

                {{-- Tarjeta envio a domicilio --}}
                <div class="rounded-lg bg-white shadow-md">
                    <label class="flex cursor-pointer items-center justify-between px-6 py-4">
                        <!-- toggle a dmomicilio radio -->
                        <div class="relative">
                            <input id="toogleButton" name="envio_type" value="2" type="radio" class="hidden"
                                x-model="envio_type" />
                            <!-- path -->
                            <div class="toggle-path h-5 w-9 cursor-pointer rounded-full bg-gray-200 shadow-inner">
                            </div>
                            <!-- circle -->
                            <div
                                class="toggle-circle absolute inset-y-0 left-0 h-3.5 w-3.5 cursor-pointer rounded-full bg-white shadow">
                            </div>
                        </div>
                        <span class="ml-2 mr-auto font-medium">
                            Recibo a domicilio
                        </span>
                        <!-- end toggle -->

                        <div class="ml-2 font-semibold text-trueGray-800">
                            <span
                                class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-md bg-trueGray-800 text-greenLime-400 hover:text-greenLime-50">
                                {{-- <i class="fas fa-truck text-lg"></i> --}}
                                <img src="{{ asset('vendor/icons/entrega.gif') }}" alt="Card">
                            </span>
                        </div>
                    </label>

                    <div class="grid grid-cols-2 gap-6 px-6 pb-6" :class="{ 'hidden': envio_type != 2 }">
                        {{-- departamento --}}
                        <div>

                            <x-jet-label value="Departamento***" />
                            <select class="form-control w-full uppercase" wire:model="departamento_id"
                                :disabled="$isLoading">
                                <option value="" disabled selected>Seleccione el departamento</option>
                                @foreach ($departamentos as $departamento)
                                    {{-- <option value="{{ $departamento->id }}">{{ $departamento->name }}</option> --}}
                                    <option value="{{ $departamento->id }}">{{ $departamento->name }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="departamento_id" />
                        </div> {{-- Fin departamentos --}}

                        {{-- Ciudades --}}
                        <div>
                            <x-jet-label value="Ciudad o Municipio**" />
                            <select class="form-control w-full uppercase" wire:model="municipio_id"
                                :disabled="$isLoading">
                                <option value="" disabled selected>Seleccione Ciudad o Municipio</option>
                                @foreach ($municipios as $municipio)
                                    {{-- <option value="{{ $municipio->id }}">{{ $municipio->name }}</option> --}}
                                    <option value="{{ $municipio->id }}">
                                        {{ $municipio->name . ' - ' . $municipio->code }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="municipio_id" />
                        </div> {{-- Fin Ciudades --}}

                        {{-- Direccion --}}
                        <div>
                            <x-jet-label value="Dirección*" />
                            <x-jet-input type="text" wire:model="address" class="form-control w-full"
                                placeholder="Ingrese la direccion" />
                            <x-jet-input-error for="address" />
                        </div> {{-- end Direccion --}}

                        {{-- casa --}}
                        <div>
                            <x-jet-label value="Edificio / Apto / Casa / Oficina" />
                            <x-jet-input type="text" wire:model="casa" class="form-control w-full"
                                placeholder="Opcional *Casa Apartamento u oficina" />
                            <x-jet-input-error for="casa" />

                        </div> {{-- end casa --}}

                        {{-- referencia --}}
                        <div class="col-span-2">
                            <x-jet-label value="Referencia / Barrio" />
                            <x-jet-input type="text" wire:model="references" class="form-control w-full"
                                placeholder="Opcional *ingrese una referencia si es necesario" />
                            <x-jet-input-error for="references" />

                        </div> {{-- end referencia --}}
                    </div>

                </div>

            </div>

            {{-- Continuar con la venta --}}
            <div>
                <div class="flex">
                    @if (Cart::count() == 0)
                        <div class="mt-2 rounded bg-lese-100 px-4 text-sm">No tiene agregado ningun item en el carrito
                        </div>

                        <div
                            class="mb-4 ml-auto mt-4 rounded bg-trueGray-900 px-5 text-lese-200 hover:bg-trueGray-700 hover:text-teal-50">
                            <a href="/">Ir a la tienda</a>
                        </div>
                    @else
                    <x-jet-button
                    class="mb-4 ml-auto mt-4 bg-trueGray-900 text-white hover:!bg-trueGray-700 hover:text-teal-50"
                    wire:click="create_order" wire:loading.attr="disabled" wire:target="create_order"
                    :disabled="(!$selectedShippingOption || !$shipping_cost) && $freeShipping != 1">
                    <div wire:loading.delay wire:target="create_order">
                        <div class="flex items-center justify-center">
                            <svg class="-ml-1 mr-3 h-5 w-5 animate-spin text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    Continuar con el pedido
                </x-jet-button>
                
                    @endif

                </div>



                <hr>

                <p class="mt-2 text-sm text-trueGray-700">El contenido de este sitio web está sujeto a las condiciones
                    aquí expuestas. Las personas (en adelante Ciudadanos-Usuarios) al acceder, navegar o usar este
                    sitio, reconocen que han leído, entendido y se obligan a cumplir con estos términos, leyes y
                    reglamentos. <a href="#politicas" class="font-bold text-lese-700">Políticas de Privacidad</a> </p>

            </div>
        </div>

        {{-- descripcion de la venta --}}
        <div class="col-span-2">
            <div class="rounded-lg bg-white p-6 shadow">

                <ul class="h-64 overflow-y-auto">
                    @forelse (Cart::content() as $item)
                        <li class="flex border-b border-gray-200 p-2">
                            <img class="h-15 mr-4 w-20 rounded-md object-cover" src="{{ $item->options->image }}">

                            <article class="flex-1">
                                <p class="font-regular text-xs uppercase text-trueGray-800">{{ $item->name }}</p>
                                <p class="text-xs font-bold uppercase text-trueGray-800">
                                    {{ $item->options->referencia }}</p>

                                <div class="flex">
                                    <p class="text-xs text-trueGray-800">Cant: <span
                                            class="font-bold">{{ $item->qty }}</span> </p>


                                </div>

                                <p class="text-xs text-trueGray-800">$<span
                                        class="font-bold">{{ number_format($item->price) }}</span>
                                </p>
                            </article>
                        </li>
                    @empty
                        <li>
                            <div class="px-4 py-6">
                                <p class="text-center text-xs text-gray-800">No tiene agregado ningun item en el
                                    carrito
                                </p>
                            </div>
                        </li>
                    @endforelse
                </ul>

                <div class="mt-4 text-gray-700">

                    <hr class="mb-3 mt-4">

                    <div class="flex items-center justify-between font-semibold">
                        <span class="text-lg">Subotal</span>

                        <span>
                            ${{ str_replace(',', '', Cart::subtotal()) }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between font-semibold">
                        <span class="text-lg">Costo de envio</span>

                        <span>
                            ${{ str_replace(',', '', $shipping_cost ?? 0) }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between font-semibold">
                        <span class="text-lg">Total</span>

                        <span>
                            ${{ str_replace(',', '', Cart::subtotal()) + $shipping_cost }}
                        </span>
                    </div>
                </div>
            </div>
            @if ($freeShipping)
                <div class="flex items-center gap-2 text-base font-medium text-greenLime-500 bg-gray-600 mt-2  rounded-md px-4 py-2">
                    <i class="fas fa-bolt mt-1"></i> 
                    <span>Envío gratis</span>
                </div>
            @else
                <div class="mt-4">
                    <x-jet-button wire:click="calculateShippingCost" wire:loading.attr="disabled"
                        wire:target="calculateShippingCost" :disabled="!$departamento_id || !$municipio_id"
                        class="flex w-full items-center justify-center bg-orange-600">
                        <div class="flex items-center gap-1" wire:loading wire:target="calculateShippingCost">
                            <div class="flex items-center justify-center">
                                <svg class="-ml-1 mr-3 h-5 w-5 animate-spin text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span>Calculando envío</span>
                            </div>

                        </div>
                        <span wire:loading.remove wire:target="calculateShippingCost">Calcular Envío</span>
                    </x-jet-button>

                    @php
                        $couriers = \App\Models\Courier::pluck('logo', 'id');
                    @endphp

                    @foreach ($validResponses as $data)
                        @php
                            $logo = $couriers[$data['carrierId']] ?? '';
                        @endphp
                        <div wire:key
                            wire:click="selectShippingOption({{ $data['totalPrice'] }}, '{{ $data['carrierId'] }}-{{ $data['serviceId'] }}')"
                            class="{{ $selectedShippingOption == $data['carrierId'] . '-' . $data['serviceId'] ? 'bg-orange-600 text-white' : 'text-gray-600' }} my-4 flex w-full cursor-pointer items-center gap-1 rounded border-2 border-transparent bg-white px-4 py-1 text-xs shadow-lg hover:border-orange-600">
                            <img src="{{ asset($logo) }}" alt="Logo"
                                class="mr-3 h-8 w-8 rounded object-cover object-center">
                            <p>{{ $data['serviceDescription'] }}</p> |
                            <p>{{ $data['deliveryEstimate'] }}</p>|
                            <p>{{ number_format($data['totalPrice'], 0, ',', '.') }} {{ $data['currency'] }}</p>

                        </div>
                    @endforeach


                </div>

            @endif

            {{-- card compra protegida --}}
            <div class="bg-lese-50 mt-2 rounded-md px-2 pt-4 pb-8">
                <div class="flex items-center justify-between">

                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g>
                                    <path
                                        d="M161.25,121.83333c0,7.912 -6.41775,14.33333 -14.33333,14.33333h-121.83333c-7.91558,0 -14.33333,-6.42133 -14.33333,-14.33333v-78.83333c0,-7.91917 6.41775,-14.33333 14.33333,-14.33333h121.83333c7.91558,0 14.33333,6.41417 14.33333,14.33333z"
                                        fill="#34495e"></path>
                                    <path
                                        d="M171.96417,107.57167c-18.23917,0 -32.21417,-14.33333 -32.21417,-14.33333v4.65833v4.80167v60.98833v4.01333v4.3c34.00583,-17.91667 32.21417,-64.42833 32.21417,-64.42833z"
                                        fill="#2ecc71"></path>
                                    <path
                                        d="M107.51792,107.57167c0,0 -1.79167,46.51167 32.23208,64.42833v-4.3v-4.01333v-60.98833v-4.80167v-4.65833c0,0 -13.98217,14.33333 -32.23208,14.33333z"
                                        fill="#2ecc71"></path>
                                    <path
                                        d="M147.45417,85.74917l-7.70417,-7.91917l-7.66833,7.88333c-0.35833,0.3225 -11.35917,11.10833 -24.58167,11.10833h-10.32l-0.39417,10.32c-0.03583,1.075 -0.43,13.83167 3.7625,29.025h11.25167c-4.80167,-15.19333 -4.3,-28.595 -4.3,-28.595c18.275,0 32.25,-14.33333 32.25,-14.33333c0,0 8.77917,8.99417 21.5,12.72083v-11.35917c-8.0625,-3.18917 -13.72417,-8.77917 -13.79583,-8.85083z"
                                        fill="#ffffff"></path>
                                    <path
                                        d="M71.66667,53.75h68.08333v14.33333h-68.08333zM32.25,107.5h50.16667v7.16667h-50.16667zM89.58333,89.58333h21.5v7.16667h-21.5zM60.91667,89.58333h21.5v7.16667h-21.5zM32.25,89.58333h21.5v7.16667h-21.5zM57.33333,71.66667c0,1.98158 -1.60175,3.58333 -3.58333,3.58333h-17.91667c-1.98158,0 -3.58333,-1.60175 -3.58333,-3.58333v-14.33333c0,-1.98158 1.60175,-3.58333 3.58333,-3.58333h17.91667c1.98158,0 3.58333,1.60175 3.58333,3.58333z"
                                        fill="#ffffff"></path>
                                </g>
                            </g>
                        </svg>
                        <p class="ml-2 text-xs">Datos Seguros</p>
                    </div>
    
                    <div class="mr-2 ">
                        Paga con nequi o contraentrega
                    </div>
                </div>

                <div >
                    <div x-data="{ payment_type: @entangle('payment_type') }">

                        <p class="mb-3 mt-6 text-lg font-semibold text-trueGray-800">Pago </p>
                        {{-- Tarjeta de envios --}}
                        <div class="rounded-lg bg-white shadow-md">
                            <label class="mb-4 flex cursor-pointer items-center justify-between px-6 py-4">        
                                <!-- toggle -->
                                <div class="relative">
                                    <input id="toogleButton" name="payment_type" value="1" type="radio" class="hidden"
                                        x-model="payment_type" />
                                    <!-- path -->
                                    <div class="toggle-path h-5 w-9 cursor-pointer rounded-full bg-gray-200 shadow-inner"></div>
                                    <!-- crcle -->
                                    <div class="toggle-circle absolute inset-y-0 left-0 h-3.5 w-3.5 cursor-pointer rounded-full bg-white shadow">
                                    </div>
                                </div>
                                <span class="ml-2 mr-auto font-medium">
                                    Pago Contraentrega
                                </span>
                                <!-- end toggle -->
        
        
                                <div class="ml-2 font-semibold text-trueGray-800">
                                    <span class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-md  text-greenLime-400 hover:text-greenLime-50">
                                        <img src="{{ asset('img/icon_contraentrega.png') }}" alt="Card">
                                    </span>
                                </div>
                            </label>
                            <div class="mb-4 grid grid-cols-2 gap-6 px-6 pb-6" :class="{ 'hidden': payment_type != 1 }">
                                Paga y recibe en la puerta de tu casa
                                
                            </div>
                        </div>
        
                        {{-- Pgo online --}}
                        <div class="rounded-lg bg-white shadow-md">
                            <label class="flex cursor-pointer items-center justify-between px-6 py-4">
                                <!-- toggle Pgo online -->
                                <div class="relative">
                                    <input id="toogleButton" name="payment_type" value="2" type="radio" class="hidden"
                                        x-model="payment_type" />
                                    <!-- path -->
                                    <div class="toggle-path h-5 w-9 cursor-pointer rounded-full bg-gray-200 shadow-inner">
                                    </div>
                                    <!-- circle -->
                                    <div class="toggle-circle absolute inset-y-0 left-0 h-3.5 w-3.5 cursor-pointer rounded-full bg-white shadow">
                                    </div>
                                </div>
                                <span class="ml-2 mr-auto font-medium">
                                    Paga con Nequi o Bancolombia
                                </span>
                                <!-- end toggle -->
        
                                <div class="ml-2 font-semibold text-trueGray-800">
                                    <span class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-md text-greenLime-400 hover:text-greenLime-50">
                                        <img src="{{ asset('img/pago_oline.png') }}" alt="Card">
                                    </span>
                                </div>
                            </label>
        
                            <div class="grid grid-cols-2 gap-6 px-6 pb-6" :class="{ 'hidden': payment_type != 2 }">
                                <div class="flex flex-col items-center ">
                                    <img class="w-16" src="{{ asset('img/nequi_logo.svg') }}" alt="logo ">
                                    <img src="{{ asset('img/qr_nequi.jpg') }}" alt="Card">
                                    <span>Lady Zamudio</span>

                                </div>

                                <div class="flex flex-col items-center ">
                                    <img class="w-32 mb-1" src="{{ asset('img/bancolombia_logo.svg') }}" alt="logo ">
                                    <img src="{{ asset('img/qr_bancolombia.jpg') }}" alt="Card">
                                    <span>Lady Zamudio</span>

                                </div>
                                
                            </div>
        
                        </div>
        
                    </div>
                </div>



            </div>{{-- end card compra protegida --}}
            

        </div>
    </div>

</div>
