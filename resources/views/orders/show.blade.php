<x-app-layout>

    <div class="sticky top-16 bg-lese-100" style="z-index: 200;">
        <div class="mx-auto flex max-w-5xl items-center px-4 py-2 sm:px-6 lg:px-8">

            <div class="container flex items-center py-2">

                <span class="flex h-6 w-6 items-center justify-center rounded-md bg-trueGray-800">
                    <i class="fas fa-box-open text-sm text-lese-400"></i>
                </span>

                <p class="ml-2 text-trueGray-800">Estado de la orden: <span
                        class="font-bold text-trueGray-900">{{ $orden->code_id }}</span></p>
            </div>
        </div>

    </div>
    {{-- Estado de la orden --}}
    <div class="mx-auto mb-2 mt-3 flex max-w-5xl items-center rounded-lg bg-white px-4 py-3 shadow-md sm:px-6 lg:px-8">
        <div class="flex items-center px-12 py-8">
            <div class="relative">
                <div
                    class="{{ $orden->status >= 2 && $orden->status != 5 ? 'bg-greenLime-400' : 'bg-gray-400' }} flex h-12 w-12 items-center justify-center rounded-full">
                    <i class="fas fa-check"></i>
                </div>
                <div class="absolute -left-1 mt-0.5">
                    <p class="text-sm">Recibido</p>
                </div>
            </div>
        </div>
        <div class="{{ $orden->status >= 3 && $orden->status != 5 ? 'bg-greenLime-400' : 'bg-gray-400' }} h-1 flex-1">
        </div>

        <div class="flex items-center px-12 py-8">
            <div class="relative">
                <div
                    class="{{ $orden->status >= 3 && $orden->status != 5 ? 'bg-greenLime-400' : 'bg-gray-400' }} flex h-12 w-12 items-center justify-center rounded-full">
                    <img
                        src="data:image/png;base64,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" />
                </div>
                <div class="absolute -left-1 mt-0.5">
                    <p class="text-sm">Enviado</p>
                </div>
            </div>
        </div>
        <div class="{{ $orden->status >= 4 && $orden->status != 5 ? 'bg-greenLime-400' : 'bg-gray-400' }} h-1 flex-1">
        </div>

        <div class="flex items-center px-12 py-8">
            <div class="relative">
                <div
                    class="{{ $orden->status >= 4 && $orden->status != 5 ? 'bg-greenLime-400' : 'bg-gray-400' }} flex h-12 w-12 items-center justify-center rounded-full">
                    <i class="fas fa-check"></i>

                </div>
                <div class="absolute -left-1 mt-0.5">
                    <p class="text-sm">Entregado</p>
                </div>
            </div>
        </div>

    </div>
    {{-- End Estado de la orden --}}

    <div class="mx-auto max-w-5xl px-4 py-1 sm:px-6 lg:px-8">


        {{-- card compra protegida --}}
        <div class="mt-2 flex items-center justify-between rounded-md bg-lese-50 p-2">
            <div class="container flex items-center py-2">

                <span class="flex h-6 w-6 items-center justify-center rounded-md bg-trueGray-800">
                    <i class="fas fa-box-open text-sm text-lese-400"></i>
                </span>

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

                            <span class="flex h-6 w-6 items-center justify-center rounded-md bg-trueGray-800">
                                <i class="fas fa-box-open text-sm text-lese-400"></i>
                            </span>

                            <p class="ml-2 text-trueGray-800"><span
                                    class="font-bold text-trueGray-900">{{ $orden->code_id }}</span>


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
                        @if ($orden->status >= 1)

                            <div class="grid w-full grid-cols-2 gap-4">
                                <div>
                                    @if ($orden->images)
                                        @foreach ($orden->images as $image)
                                            <img src="{{ Storage::url($image->url) }}" width="100px">
                                        @endforeach
                                        {{-- <img src="{{ Storage::url($orden->images->last()->url)}}" width="100px"> --}}
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


                        @endif

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
                    <span class="flex h-6 w-6 items-center justify-center rounded-md bg-trueGray-800">
                        <i class="fas fa-truck text-sm text-lese-400"></i>
                    </span>
                    <p class="ml-2 text-lg font-bold text-trueGray-700">Envío</p>
                </div>
                @if ($orden->envio_type == 1)
                    <p class="">{{ $orden->contact }}, los productos deben ser recogidos en bodega.</p>
                    <a href="https://www.google.com/maps/place/Cra.+57+%234b-48,+Bogot%C3%A1/@4.6225628,-74.1201713,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f995155693551:0x708bb21a7ec37fbd!8m2!3d4.6225628!4d-74.1179826?hl=es"
                        target="_blank">
                        <div class="mb-2 mt-4 flex items-center rounded bg-gray-200 p-2">
                            <i class="fas fa-route mr-2 text-xl"></i>
                            <p class="uppercase hover:font-bold hover:underline">Calle 57 # 4b - 45 Local 203 -
                                Bogotá</p>
                        </div>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=573124533707&text=Hola mi nombre es {{ $orden->contact }}, mi número de orden es {{ $orden->consecutivo }}, cuando puedo pasar a recoger.?"
                        target="_blank">
                        <div class="flex items-center rounded bg-gray-200 p-2">
                            <i class="fab fa-whatsapp-square mr-2 text-3xl text-greenLime-500"></i>
                            <p class="hover:font-bold hover:underline">Número de contacto: 3124533707</p>
                        </div>
                    </a>
                @else
                    <p>Su pedido será enviado a: </p>
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt mr-2 text-sm"></i>
                        <p class="text-sm uppercase">{{ $orden->address }} - {{ $orden->casa }}</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-map-signs mr-1 text-sm"></i>
                        <p class="text-sm capitalize">{{ $orden->departamento->name }} -
                            {{ $orden->municipio->name }} -
                            {{ $orden->references }}</p>
                    </div>
                @endif
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

</x-app-layout>
