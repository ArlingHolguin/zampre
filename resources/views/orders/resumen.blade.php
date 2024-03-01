<x-app-layout>
    <div class="bg-lese-100 sticky top-16" style="z-index: 200;">
        <div class=" flex items-center container  py-2">
            {{-- icono --}}
            <span class="bg-trueGray-800 rounded-md h-8 w-8 flex items-center justify-center">
                <i class="fas fa-file-invoice-dollar text-xl text-lese-400"></i>
  
            </span>
            {{-- end icono --}}
            <p class="text-xl font-black text-trueGray-900 mx-2 uppercase">Resumen del pedido</p>
        </div>
  
    </div>
    <div class="container">
        <div class="bg-white rounded-lg py-4 mb-6 mt-3">
    
            <div class=" flex items-center container  py-2">
    
                <span class="bg-trueGray-800 rounded-md h-6 w-6 flex items-center justify-center">
                    <i class="fas fa-box-open text-sm text-lese-400"></i>
                </span>
    
                <p class="text-trueGray-800 ml-2">Orden: <span
                        class="font-bold text-trueGray-900">{{ $orden->code_id }}</span></p>
                        
            </div>
        </div>{{-- end numero de order --}}

        <div class="bg-white rounded-lg py-4 mb-6 mt-3">
            <div class="container  py-2">
                <div class="flex items-center mb-3">
                    <span class="bg-trueGray-800 rounded-md h-6 w-6 flex items-center justify-center">
                        <i class="fas fa-truck text-sm text-lese-400"></i>
                    </span>
                    <p class="text-trueGray-700 text-lg font-bold ml-2">Envío</p>
                </div>
                @if ($orden->envio_type == 1)

                    <p class="">{{$orden->contact}}, los productos deben ser recogidos en bodega.</p>
                    <a href="https://www.google.com/maps/place/Cra.+57+%234b-48,+Bogot%C3%A1/@4.6225628,-74.1201713,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f995155693551:0x708bb21a7ec37fbd!8m2!3d4.6225628!4d-74.1179826?hl=es"
                        target="_blank">
                        <div class="flex items-center mb-2 mt-4 bg-gray-200 rounded p-2">
                            <i class="fas fa-route mr-2 text-xl"></i>
                            <p class="uppercase hover:font-bold hover:underline">Calle 57 # 4b - 45 Local 203 -
                                Bogotá</p>
                        </div>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=573124533707&text=Hola mi nombre es {{ $orden->contact }}, mi número de orden es {{ $orden->consecutivo }}, cuando puedo pasar a recoger.?"
                        target="_blank">
                        <div class="flex items-center bg-gray-200 rounded p-2">
                            <i class="fab fa-whatsapp-square mr-2 text-3xl text-greenLime-500"></i>
                            <p class="hover:font-bold hover:underline">Número de contacto: 3124533707</p>
                        </div>
                    </a>



                @else
                    <p>Su pedio será enviado a: </p>
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt mr-2 text-sm"></i>
                        <p class="uppercase text-sm">{{ $orden->address }} - {{ $orden->casa }}</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-map-signs mr-1 text-sm"></i>
                        <p class="capitalize text-sm">{{ $orden->departamento->name }} -
                            {{ $orden->municipio->name }} -
                            {{ $orden->references }}</p>
                    </div>

                @endif
            </div>
        </div>

        <div class="bg-white rounded-lg py-4 mb-6 mt-3">
            <div class="container  py-2">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Precio</th>
                            <th>Cant</th>
                            <th>Total</th>
                        </tr>
  
                    </thead>
                    <tbody class="divide-y divide-trueGray-200">
                        @foreach ($items as $item)
                            <tr>
                                <td>
                                    <div class="flex p-2">
                                        <img class="h-10 w-15 object-cover object-center rounded-full"
                                            src="{{ $item->options->image }}" alt="{{ $item->name }}">
  
                                        <article class="ml-2">
                                            <p class="font-bold text-xs">{{ $item->options->referencia }}</p>
                                            <div class="flex text-xs">
                                            <p class="font-bold text-xs">{{ $item->name }}</p>
                                               
                                            </div>
                                        </article>
                                    </div>
                                </td>
                                <td class="text-center text-xs">
                                    {{ $item->price }}
                                </td>
                                <td class="text-center text-xs">
                                    {{ $item->qty }}
                                </td>
                                <td class="text-center text-xs">
                                    {{ $item->price * $item->qty }}
                                </td>
                            </tr>
  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- card compra protegida --}}
        <div class=" flex justify-between mt-2 bg-lese-50 p-2 rounded-md items-center">
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
                <p class="text-xs ml-2">Datos protegidos</p>
            </div>

            <div class="mr-2">
                
                <x-danger-enlace href="{{route('orders.show', $orden)}}" class="w-full justify-center">
                    <span class=" font-medium hover:font-bold">Estado del Pedido</span>
                 </x-danger-enlace>
            </div>



        </div>{{-- end card compra protegida --}}

    </div>
</x-app-layout>