<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Pedido {{$orden->code_id}}</title>
    <style>
        @page {
            margin: 0cm 0cm;
            font-size: 1em;
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
            height: 2cm;
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
                width:    21.8cm;
                height:   28cm;

                /** Tu marca de agua debe estar detrás de cada contenido **/
                z-index:  -1000;
            }
    </style>
</head>
<header>
    <img class="avatar mb-2 float-left ml-4 pl-4 pt-2 " src="{{ asset('img/zampre_blanco.svg') }}" width="30%">
</header>

<body>
    

    <div class="card card-lg mb-5">
        <div class="card-body">
            <div class="row justify-content-lg-between">
                {{-- <div class="col-sm order-2 order-sm-1 mb-3">
                    <div class="mb-2">
                        <img class="avatar" src="{{ asset('lese/img/logo-1.png') }}" alt="Logo">
                    </div>
                </div> --}}
                <!-- End Col -->

                <div class="col-sm-auto order-1 order-sm-2 text-sm-end mb-3 w-full">
                    <div class="mb-3">
                        

                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    
                                    <th class="text-left"><p><span>{{$orden->code_id}}</span></p></th>
                                    <th class="text-left"></th>
                                    <th class="text-right"><img src="{{asset('lese/qrcodes/'.$orden->code_id.'.svg')}}" alt="{{$orden->code_id}}" width="30%"></th>
                                </tr>
                            </thead>
                        </table>
                        
                       
                      
                        
                    </div>

                    <address class="text-dark" style="font-size: 8pt;">
                        <h5 class="mb-0"><strong>{{$orden->user->profile->empresa ?? ''}}</strong></h5>
                        <p class="mb-0"><strong>{{$orden->user->profile->document_type ?? ''}}: {{$orden->user->profile->document_number ?? ''}}</strong></p>
                        Recibe: {{$orden->contact}}<br>
                        {{$orden->phone}}<br>
                        {{$orden->municipio ? $orden->municipio->name : 'Recoge en Bodega'}} - {{$orden->departamento ? $orden->departamento->name : '.'}}<br>
                        {{$orden->address->name ?? ''}} - {{$orden->casa ?? ''}}<br>
                        {{$orden->email ?? ''}}<br>
                        {{$orden->created_at->format('d/m/Y')}}
                        Creada por: {{$orden->user->name ?? ''}}<br>
                        
                        
                    </address>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->


            <!-- Table -->
            <div class="table">

                <table class="table table-sm">
                    <thead style="background-color: rgb(252, 217, 45);">
                        <tr>
                            
                            <th class="text-left">Ref</th>
                            <th class="text-left">Descripción</th>
                            <th class="text-left">Cant</th>
                        </tr>
                    </thead>

                    <tbody>
                        <div id="watermark">
                            <img src="{{asset('lese/img/logo-marca-agua1.svg')}}" width="70%" />
                        </div>
                        @foreach ($items as $item)
                        
                        <tr> 
                            
                            {{-- <th class="text-left">{{$item->options->referencia}}</th> --}}
                            <td class="text-sm-left">{{$item->name}}</td>
                            <td class="text-left">{{$item->qty}}</td>
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
    <table class="table table-borderless">
        
            <tr class="mb-4">
                <th class="text-center" style="font-size: 9px; color: #fff; line-height:0px;">
                    
                    <img class="avatar" src="{{ asset('lese/img/icon-instagram-light.svg') }}" width="15px"> 
                    <span>distribucioneslese</span>
                
            </th>
                
                <th class="text-center" style="font-size: 9px; color: #fff; line-height:0px;">
                    
                        <img class="avatar" src="{{ asset('lese/img/icon-facebook-light.svg') }}" width="15px"> 
                        <span>distribucioneslese</span>
                    
                </th>
                <th class="text-center" style="font-size: 9px; color: #fff; line-height:0px;">
                    
                    <img class="avatar" src="{{ asset('lese/img/icon-whatsapp-light.svg') }}" width="15px"> 
                    <span>3004206063 - 3143949036</span>
                
            </th>
            <th class="text-center" style="font-size: 9px; color: #fff; line-height:0px;">
                    
                <img class="avatar" src="{{ asset('lese/img/icon-email-light.svg') }}" width="15px"> 
                <span>distribucioneslese@gmail.com</span>
            
        </th>
                
                <th class="text-center" style="font-size: 9px; color: #fff">
                    <p class="" style="line-height:10px;"><span> 
                        <br>Distribuciones LESE<br>Nit. 9014166272</span><br>
                        <img class="avatar" src="{{ asset('lese/img/logo-blanco.svg') }}" width="10%">
                    </p>
                </th>
            </tr>
            <tr aria-colspan="3">
                <th>Hola</th>
            </tr>
       
    </table>
</footer>

</html>
