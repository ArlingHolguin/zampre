<div class="flex mx-2  flex-col min-w-0 mb-2 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
    <div class="flex-auto p-4">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">Productos</p>
                    <h5 class="mb-0 font-bold">
                        {{$count}} unidades
                        <span class="leading-normal text-sm font-weight-bolder text-gray-500"><br>{{$publicados}} <small>Publicados</small> </span><br>
                        {{-- Boton lese componente btn-action-lese --}}
                          {{-- Boton lese componente <components>btn-lese-link --}}
                       <x-btn-lese-link href="{{route('ShowProducts')}}">Productos</x-btn-lese-link>
                    </h5>
                </div>
            </div>
            <div class="w-4/12 max-w-full px-3 ml-auto text-right flex-0">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-lese-500 shadow-soft-2xl">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAB90lEQVR4nO2aO0oDURSGP19pDCipfGQFFiKuIG5HK8UF6A4ErXQTgo82lcFitNAFWCjapQko+ECLGSEZb5yZO/eVzPngEMIl+f9z7pkzDwYEQRAEQRD0mAf2gXvgDfh2FK/AHbAHzFnPcgjrwMsQgy7jOfHilBWgW9K4yegmnpywADxYTkgnHoGmxbwBmAUihfgB0LAt3kcj0Uz7iBKPVpgCThWiJ7YEc3Ck8HMBTNsQO1SIXdoSy8mwTTk2LbSrEImAumkhDeqoD8sdUwJrwIdCIPR4B1azkpvMUYBt/La5LjMY6oIn/O9mmVPjv0zkKMAn8bAZRb7I6N48BfjW+I1PCvnNMwPGGimAbwO+cXF6Sx+TRbE6cyrfAVIA3wZ842IGBH3dUPkOkAL4NuCbUAvQSkJ3PTeh3gy1k88NjXXjftP32LZp9Wmpdjlr3bhf1wVo92m1NdYL+Q3xEMjSK7s+QKhD0BlSAN8GfBPi4+6sGWN0BlW+A6QAvg34JsQZUPRiq9RMqHwHSAF8G/BNiDPA6TPEyndAngL0Ut+tv4pWgrS3tHctrhm8vz4Dlk38sWGawDmDXjsm/niLvw8ZRiU2TRSgBtwGkEzRiIjfEzLCEnATQFJFkl80lfwvNeLDoUM8XHwnmY4ecEXc9sZ2XhAEQRCE8eUHlyL6QYumtOAAAAAASUVORK5CYII=">


                </div>
            </div>
        </div>
    </div>
</div>
