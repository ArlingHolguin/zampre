<div>
    {{-- Titulo --}}
    <div class="bg-lese-100 sticky top-16 z-40">
        <div class=" flex items-center container  py-2">
            {{-- icono --}}
            <span class="bg-trueGray-800 rounded-md h-8 w-8 flex items-center justify-center">
                <i class="fas fa-box-open text-xl text-lese-400"></i>
            </span>
            {{-- end icono --}}
            <p class="text-xl font-black text-trueGray-900 mx-2 uppercase">Datos de envío </p>
        </div>

    </div>
    {{-- End Titulo --}}

    <div class="container py-8 grid grid-cols-5 gap-6">
        <div class="col-span-3">
            <div class="bg-white rounded-lg shadow-md p-4 pb-5">
                {{-- Nombre Contacto --}}
                <div class="mb-4">
                    <x-jet-label value="Nombre de contacto" />
                    <x-jet-input type="text" placeholder="Nombre de la persona que recibe el producto"
                        class=" form-control w-full focus:border-lese-200" wire:model.defer="contact"/>
                    <x-jet-input-error for="contact" />
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

                <p class="mt-6 mb-3 text-lg font-semibold text-trueGray-800">Envíos</p>
                {{-- Tarjeta de envios --}}
                <label class="flex items-center justify-between bg-white rounded-lg shadow-md px-6 py-4 mb-4">

                    <!-- toggle -->
                    <div class="relative">
                        <input id="toogleButton" name="envio_type" value="1" type="radio" class="hidden"
                            x-model="envio_type" />
                        <!-- path -->
                        <div class="toggle-path bg-gray-200 w-9 h-5 rounded-full shadow-inner  cursor-pointer"></div>
                        <!-- crcle -->
                        <div
                            class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0  cursor-pointer">
                        </div>
                    </div>
                    <span class="ml-2 mr-auto">
                        Recojo en bodega. DiverPlaza - Bogotá
                    </span>
                    <!-- end toggle -->


                    <div class="font-semibold text-trueGray-800 ml-2">
                        <span
                            class="bg-trueGray-800 rounded-md h-8 w-8 flex items-center justify-center cursor-pointer text-greenLime-400  hover:text-greenLime-50">
                            <img src="{{ asset('vendor/icons/producto.gif') }}" alt="Card">
                            {{-- <i class="fas fa-gift text-lg "></i> --}}
                        </span>
                    </div>
                </label>

                {{-- Tarjeta envio a domicilio --}}
                <div class="bg-white rounded-lg shadow-md">
                    <label class="flex items-center justify-between  px-6 py-4">
                        <!-- toggle a dmomicilio radio -->
                        <div class="relative">
                            <input id="toogleButton" name="envio_type" value="2" type="radio" class="hidden"
                                x-model="envio_type" />
                            <!-- path -->
                            <div class="toggle-path bg-gray-200 w-9 h-5 rounded-full shadow-inner  cursor-pointer">
                            </div>
                            <!-- circle -->
                            <div
                                class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0  cursor-pointer">
                            </div>
                        </div>
                        <span class="ml-2 mr-auto">
                            A domicilio
                        </span>
                        <!-- end toggle -->

                        <div class="font-semibold text-trueGray-800 ml-2">
                            <span
                                class="bg-trueGray-800 rounded-md h-8 w-8 flex items-center justify-center cursor-pointer text-greenLime-400  hover:text-greenLime-50">
                                {{-- <i class="fas fa-truck text-lg"></i> --}}
                                <img src="{{ asset('vendor/icons/entrega.gif') }}" alt="Card">
                            </span>
                        </div>
                    </label>

                    <div class="px-6 pb-6 grid grid-cols-2 gap-6 hidden" :class="{ 'hidden': envio_type !=2 }">
                        {{-- departamento --}}
                        <div>

                            <x-jet-label value="Departamento***" />
                            <select class="form-control w-full" wire:model="departamento_id">
                                <option value="" disabled selected>Seleccione el departamento</option>
                                @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}">{{ $departamento->name }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="departamento_id" />
                        </div> {{-- Fin departamentos --}}

                        {{-- Ciudades --}}
                        <div>
                            <x-jet-label value="Ciudad o Municipio**" />
                            <select class="form-control w-full" wire:model="municipio_id">
                                <option value="" disabled selected>Seleccione Ciudad o Municipio</option>
                                @foreach ($municipios as $municipio)
                                    <option value="{{ $municipio->id }}">{{ $municipio->name }}</option>
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
                   <div class="text-sm bg-lese-100 px-4 mt-2 rounded">No tiene agregado ningun item en el carrito</div>
                   
                   <div class="mt-4 mb-4 rounded px-5 ml-auto bg-trueGray-900 text-lese-200 hover:text-teal-50 hover:bg-trueGray-700">
                      <a href="/">Ir a la tienda</a>
                   </div>
                   @else
                    
                   <x-jet-button
                       class="mt-4 mb-4 ml-auto bg-trueGray-900 text-lese-200 hover:text-teal-50 hover:bg-trueGray-700"
                       wire:click="create_order">
                       <div wire:loading.delay wire:target="create_order">
                           <div class="animate-spin h-5 w-5 mr-3">
                               <i class="fas fa-spinner text-lese-300 text-md"></i>
                           </div>
                       </div>
                       Continuar con el pedido
                   </x-jet-button>
                   @endif

                </div>



                <hr>

                <p class="text-sm text-trueGray-700 mt-2">El contenido de este sitio web está sujeto a las condiciones
                    aquí expuestas. Las personas (en adelante Ciudadanos-Usuarios) al acceder, navegar o usar este
                    sitio, reconocen que han leído, entendido y se obligan a cumplir con estos términos, leyes y
                    reglamentos. <a href="#politicas" class="font-bold text-lese-700">Políticas de Privacidad</a> </p>

            </div>




        </div>

        {{-- descripcion de la venta --}}
        <div class="col-span-2">
            <div class="bg-white rounded-lg shadow p-6">

                <ul class="overflow-y-auto h-64">
                    @forelse (Cart::content() as $item)
                        <li class="flex p-2 border-b border-gray-200">
                            <img class="h-15 w-20 object-cover mr-4 rounded-md" src="{{ $item->options->image }}">

                            <article class="flex-1">
                                <p class="font-regular text-xs text-trueGray-800 uppercase">{{ $item->name }}</p>
                                <p class="font-bold text-xs text-trueGray-800 uppercase">
                                    {{ $item->options->referencia }}</p>

                                <div class="flex">
                                    <p class="text-xs text-trueGray-800">Cant: <span
                                            class="font-bold">{{ $item->qty }}</span> </p>


                                </div>

                                <p class="text-xs text-trueGray-800">$<span
                                        class="font-bold">{{ number_format($item->price) }}</span></p>
                            </article>
                        </li>

                    @empty
                        <li>
                            <div class="py-6 px-4">
                                <p class="text-center text-gray-800 text-xs">No tiene agregado ningun item en el carrito
                                </p>
                            </div>
                        </li>
                    @endforelse
                </ul>

                <div class="text-gray-700 mt-4">
                    

                    <hr class="mt-4 mb-3">

                    <p class="flex justify-between items-center font-semibold">
                        <span class="text-lg">Total</span>
                        
                         <span>${{ str_replace( ',', '.', Cart::subtotal() ) }}</span>  
                        </p>
                </div>
            </div>

            {{-- card compra protegida --}}
            <div class=" flex justify-between mt-2 bg-lesez-50 p-2 rounded-md items-center">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172"
                        style=" fill:#000000;">
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
                    <p class="text-xs ml-2">Datos Seguros</p>
                </div>

                <div class="mr-2">
                    <img class="h-5 w-full object-center " src="{{ asset('vendor/icons/mercadopago-ancho.svg') }}"
                        alt="Mercado Pago">
                </div>



            </div>{{-- end card compra protegida --}}

        </div>
    </div>

</div>
