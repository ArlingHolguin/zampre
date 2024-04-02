<x-admin-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orden') }}
        </h2>
    </x-slot> --}}
    <div class="bg-lese-100">
        <div class="mx-auto flex max-w-5xl items-center px-4 py-2 sm:px-6 lg:px-8">

            <div class="container flex items-center py-2">

                <span class="flex h-6 w-6 items-center justify-center rounded-md bg-trueGray-600">
                    <i class="fas fa-box-open text-sm text-white"></i>
                </span>

                <p class="ml-2 text-trueGray-800">Estado de la orden: <span
                        class="font-bold text-trueGray-900">{{ $orden->code_id }}</span></p>
            </div>
        </div>

    </div>
    

    <div class="mx-auto max-w-5xl px-4 py-1 sm:px-6 lg:px-8">


        {{-- card compra protegida --}}
        <div class="mt-2 flex items-center justify-between rounded-md bg-lese-50 p-2">
            <div class="container flex items-center py-2">

                <p class="ml-2 text-trueGray-800">Orden: <span
                        class="font-bold text-trueGray-900">{{ $orden->code_id }}</span>
                </p>


            </div>

            <div class="mr-2">

                <x-danger-enlace href="{{ route('pdfpedido', $orden) }}" class="w-full justify-center">
                    <span class="font-medium hover:font-bold">Imprimir</span>
                </x-danger-enlace>
            </div>



        </div>{{-- end card compra protegida --}}

        <div>
            {{-- card cambiar estado de la orden --}}
            @role('superadmin|admin')
                <div class="mt-2 rounded-md bg-gray-50 p-2">
                    <div class="flex items-center justify-between">
                        <div class="container flex items-center py-2">
                                @switch($orden)
                                    @case($orden->status == 1)
                                    <div class="ml-2 items-center justify-center rounded-lg bg-gray-300 px-8 py-1 font-bold uppercase shadow-md"
                                        style="font-size: 10px;">Pendiente</div>
                                @break

                                @case($orden->status == 2)
                                    <div class="ml-2 items-center justify-center rounded-lg bg-blue-500 px-8 py-1 font-bold uppercase text-white shadow-md"
                                        style="font-size: 10px;">Recibido</div>
                                @break

                                @case($orden->status == 3)
                                    <div class="ml-2 flex items-center justify-center rounded-lg bg-greenLime-500 px-8 py-1 font-bold uppercase text-white shadow-md"
                                        style="font-size: 10px;">Enviado</div>
                                @break

                                @case($orden->status == 4)
                                    <div class="ml-2 items-center justify-center rounded-lg bg-green-600 px-8 py-1 font-bold uppercase text-white shadow-md"
                                        style="font-size: 10px;">Entregado</div>
                                @break
                                @case($orden->status == 6)
                                    <div class="ml-2 items-center justify-center rounded-lg bg-red-600 px-8 py-1 font-bold uppercase text-white shadow-md"
                                        style="font-size: 10px;">Perdido</div>
                                @break
                                @case($orden->status == 7)
                                    <div class="ml-2 items-center justify-center rounded-lg bg-red-600 px-8 py-1 font-bold uppercase text-white shadow-md"
                                        style="font-size: 10px;">Devuelto</div>
                                @break

                                @default
                                    <div class="ml-2 items-center justify-center rounded-lg bg-gray-300 px-8 py-1 font-bold uppercase shadow-md"
                                        style="font-size: 10px;">Anulado</div>
                            @endswitch
                        </div>
                        </p>




                        <div class="mr-2">
                            {!! Form::model($orden, [
                                'route' => ['orders.update', $orden],
                                'autocomplete' => 'off',
                                'files' => 'true',
                                'method' => 'put',
                            ]) !!}
                            {{-- {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'autocomplete' => 'off', 'files' => 'true', 'method' => 'put']) !!} --}}
                            {{-- <x-danger-enlace href="" class="w-full justify-center">
                                <span class=" font-medium hover:font-bold">Actualizar</span>
                            </x-danger-enlace> --}}
                            <x-jet-button>
                                Actualizar
                            </x-jet-button>
                        </div>
                    </div>
                    <div class="px-8 py-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-2 w-1/2">
                                {!! Form::select('status', $list, null, [
                                    'class' =>
                                        'border-yellow-300 focus:border-yellow-300 focus:ring focus:ring-yellow-200 focus:ring-opacity-50 rounded-md shadow-sm',
                                ]) !!}
                            </div>



                        </div>
                        {{-- @if ($orden->status >= 1)

                            <div class="grid w-full grid-cols-2 gap-4">
                                <div>
                                    @if ($orden->images)
                                        @foreach ($orden->images as $image)
                                            <img src="{{ Storage::url($image->url) }}" width="100px">
                                        @endforeach
                                    @else
                                        <img src="{{ asset('lese/img/logo-lese-color.svg') }}" alt="">
                                    @endif

                                </div>

                                <div>
                                    <div class="w-full rounded-lg bg-lese-50 p-6">
                                        <p class="mb-2 text-xs">Carga la guía del pedido si es necesario.</p>
                                        {!! Form::file('files') !!}

                                    </div>
                                </div>
                            </div>
                        @else
                            👌


                        @endif --}}

                        {!! Form::close() !!}



                    </div>
                </div>
            @else
                <div></div>
            @endrole



            {{-- card cambiar estado de la orden --}}

        </div>
    </div>
    <div class="mx-auto max-w-5xl px-4 py-1 sm:px-6 lg:px-8">

        <div class="mb-6 mt-3 rounded-lg bg-white py-4">
            <div class="container py-2">
                <div class="mb-3 flex items-center">
                    <p class="text-lg font-bold text-trueGray-700">Orden</p>
                </div>
                {{-- @json($info_ip) --}}
                <div class="flex flex-col text-sm mb-4">
                    <div>Ip: {{ $info_ip->ip }}</div>
                    <div>Fecha y hora: {{ $info_ip->ts }}</div>
                </div>

               

                <p class=""><span class="capitalize">😉 {{Auth::user()->name}}</span>, debes enviar a: {{ $orden->contact }}</p>
                <div class="flex flex-col">
                    <div>
                        <span>Pago:</span>
                        <span class="uppercase font-semibold">{{ $orden->payment_type == 1 ? 'Contra entrega' : 'Pago por Nequi'}}</span>
                    </div>
                    <div>
                        <span>Celular:</span>
                        <span class="uppercase font-semibold">{{ $orden->phone}}</span>
                    </div>
                    <div>
                        <span>Oficina:</span>
                        <span class="uppercase font-semibold">{{ $orden->references}}</span>
                    </div>
                    <div>
                        <span>Ciudad/Municipio:</span>
                        <span class="uppercase font-semibold">{{ $orden->municipio->name}}</span>
                    </div>
                    <div>
                        <span>Departamento:</span>
                        <span class="uppercase font-semibold">{{ $orden->departamento->name}}</span>
                    </div>
                    @if ($orden->address)
                        <div>
                            <span>Dirección:</span>
                            <span class="uppercase font-semibold">{{ $orden->address}}</span>
                            - {{ $orden->casa }}
                        </div>
                        
                    @endif
                    
                    <div class="flex items-center justify-end mt-4 w-full">
                        <span>😎 Envía lo más pronto posible.</span>
                    </div>

                </div>
            </div>
        </div>

        <div class="mb-6 mt-3 rounded-lg bg-white py-4">
            <div class="container py-2">
                <table class="w-full table-auto">
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
                                    <div class="flex items-center p-2">
                                        <img class="w-15 h-10 rounded-full object-cover object-center"
                                            src="{{ $item->options->image }}" alt="{{ $item->name }}">

                                        <article class="ml-2">
                                            {{-- <p class="font-bold text-xs">{{ $item->options->referencia }}</p> --}}
                                            <div class="flex flex-col text-xs">
                                                @php
                                                    $colorName =
                                                        App\Models\Color::where('id', $item->options->color_id)->first()
                                                            ->name ?? '';
                                                    $sizeName =
                                                        App\Models\Size::where('id', $item->options->size_id)->first()
                                                            ->name ?? '';
                                                @endphp
                                                <span>{{ $item->name }}</span>
                                                @empty(!$item->options->color_id)
                                                    <small>Color: {{ $colorName }}</small>
                                                @endempty
                                                @empty(!$item->options->size_id)
                                                    <small>Talla/medida: {{ $sizeName }}</small>
                                                @endempty

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
    </div>
    
</x-admin-layout>