<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
            integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <title>Pedido {{ $orden->code_id }}</title>
        <style>
            @page {
                margin: 0cm 0cm;
            }

            body {
                margin: 3cm 2cm 2cm;
            }

            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2.5cm;
                background-color: #ea580c;
                color: white;
                text-align: center;
                line-height: 40px;
            }

            footer {
                position: fixed;
                bottom: 0cm;
                left: 0cm;
                right: 0cm;
                height: 1cm;
                background-color: #ea580c;
                color: white;
                text-align: center;
                line-height: 40px;
                padding: 6px;
            }

            #watermark {
                position: absolute;
                /* bottom:   0px;
                left:     0px; */
                /** El ancho y la altura pueden cambiar
                    según las dimensiones de su membrete
                **/
                width: 21.8cm;
                height: 28cm;

                /** Tu marca de agua debe estar detrás de cada contenido **/
                z-index: -1000;
            }
        </style>
    </head>
    <header>
        <img class="avatar float-left mb-2 ml-4 pl-4 pt-2" src="{{ asset('img/zampre_blanco.svg') }}" width="30%">
    </header>

    <body>
        <div class="card card-lg mb-5">
            <div class="card-body">
                <div class="row justify-content-lg-between">
                    <div class="col-sm-auto order-sm-2 text-sm-end order-1 mb-3 w-full">
                        <div class="mb-3">
                            <table class="table-borderless table">
                                <thead>
                                    <tr>

                                        <th class="text-left">
                                            <p><span>{{ $orden->code_id }}</span></p>
                                        </th>
                                        <th class="text-left"></th>
                                        <th class="text-right"><img
                                                src="{{ asset('lese/qrcodes/' . $orden->code_id . '.svg') }}"
                                                alt="{{ $orden->code_id }}" width="30%"></th>
                                    </tr>
                                </thead>
                            </table>




                        </div>

                        <address class="text-dark" style="font-size: 8pt;">
                            <h5 class="mb-0"><strong>{{ $orden->user->profile->empresa ?? '' }}</strong></h5>
                            <p class="mb-0"><strong>{{ $orden->user->profile->document_type ?? '' }}:
                                    {{ $orden->user->profile->document_number ?? '' }}</strong></p>
                            Recibe: {{ $orden->contact }}<br>
                            {{ $orden->phone }}<br>
                            {{ $orden->municipio ? $orden->municipio->name : 'Recoge en Bodega' }} -
                            {{ $orden->departamento ? $orden->departamento->name : '.' }}<br>
                            {{ $orden->address->name ?? '' }} - {{ $orden->casa ?? '' }}<br>
                            {{ $orden->email ?? '' }}<br>
                            {{ $orden->created_at->format('d/m/Y') }}
                            {{-- Creada por: {{ $orden->user->name ?? '' }}<br> --}}


                        </address>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->


                <!-- Table -->
                <div class="table">

                    <table class="table-sm table">
                        <thead style="background-color: rgb(238, 108, 1);">
                            <tr class="text-white">

                                <th class="text-left">#</th>
                                <th class="text-left">Descripción</th>
                                <th class="text-left">Cant</th>
                            </tr>
                        </thead>

                        <tbody>
                            <div id="watermark">
                                <img src="{{ asset('img/mark-logo.png') }}" width="70%" />
                            </div>
                            @foreach ($items as $item)
                                <tr>

                                    <th class="text-left">
                                        <img class="img-fluid img-thumbnail" style="width: 50px"
                                            src="{{ $item->options->image }}" alt="">
                                    </th>
                                    <td class="text-sm-left">
                                        @php
                                            $colorName = App\Models\Color::where('id', $item->options->color_id)->first()->name ?? '';
                                            $sizeName = App\Models\Size::where('id', $item->options->size_id)->first()->name ?? '';
                                        @endphp
                                        <span>{{ $item->name }}</span>
                                        <br>
                                        @empty(!$item->options->color_id)
                                            <small>Color: {{ $colorName  }}</small><br>
                                        @endempty
                                        @empty(!$item->options->size_id)
                                            <small>Talla/medida: {{ $sizeName }}</small>
                                        @endempty
                                    </td>
                                    <td class="text-left">{{ $item->qty }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- End Table -->
            </div>
        </div>
    </body>
    <footer>
        {{-- <p style="font-size: 8pt;"><strong>Distribuciones LESE  - Nit 9014166272<br>© {{date('Y')}} lesedistribuciones.com</strong></p> --}}
        <table class="table-borderless table">

            <tr>
                <th class="text-center" style="font-size: 9px; color: #fff; line-height:0px; ">
                    <div class="" style="display: flex; align-items: center;">
                        <img class="avatar" src="{{ asset('lese/img/icon-instagram-light.svg') }}" width="15px">
                        <span class="ml-1">@productos.zampre</span>
                    </div>
                </th>

                <th class="text-center" style="font-size: 9px; color: #fff; line-height:0px;">

                    <img class="avatar" src="{{ asset('lese/img/icon-facebook-light.svg') }}" width="15px">
                    <span>@zampreonline</span>

                </th>
                <th class="text-center" style="font-size: 9px; color: #fff; line-height:0px;">

                    <img class="avatar" src="{{ asset('lese/img/icon-whatsapp-light.svg') }}" width="15px">
                    <span>301-6358844</span>

                </th>
                <th class="text-center" style="font-size: 9px; color: #fff; line-height:0px;">

                    <img class="avatar" src="{{ asset('lese/img/icon-email-light.svg') }}" width="15px">
                    <span>productoszampre@gmail.com</span>

                </th>
                <th class="text-center" style="font-size: 9px; color: #fff">
                    <p class="" style="line-height:10px;"><span>
                            <br>ZAMPRE S.A.S<br>Nit. 9014165529</span> <span>© {{ date('Y') }} Zampre</span>
                    </p>
                </th>
            </tr>

        </table>
    </footer>

</html>
