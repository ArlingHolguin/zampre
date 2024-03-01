<div>


    <x-slot name="header">
        <div class="flex items-center">
            <div class="inline-block w-12 h-12 text-center rounded-lg bg-lese-500 shadow-soft-2xl">
                <img
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAB90lEQVR4nO2aO0oDURSGP19pDCipfGQFFiKuIG5HK8UF6A4ErXQTgo82lcFitNAFWCjapQko+ECLGSEZb5yZO/eVzPngEMIl+f9z7pkzDwYEQRAEQRD0mAf2gXvgDfh2FK/AHbAHzFnPcgjrwMsQgy7jOfHilBWgW9K4yegmnpywADxYTkgnHoGmxbwBmAUihfgB0LAt3kcj0Uz7iBKPVpgCThWiJ7YEc3Ck8HMBTNsQO1SIXdoSy8mwTTk2LbSrEImAumkhDeqoD8sdUwJrwIdCIPR4B1azkpvMUYBt/La5LjMY6oIn/O9mmVPjv0zkKMAn8bAZRb7I6N48BfjW+I1PCvnNMwPGGimAbwO+cXF6Sx+TRbE6cyrfAVIA3wZ842IGBH3dUPkOkAL4NuCbUAvQSkJ3PTeh3gy1k88NjXXjftP32LZp9Wmpdjlr3bhf1wVo92m1NdYL+Q3xEMjSK7s+QKhD0BlSAN8GfBPi4+6sGWN0BlW+A6QAvg34JsQZUPRiq9RMqHwHSAF8G/BNiDPA6TPEyndAngL0Ut+tv4pWgrS3tHctrhm8vz4Dlk38sWGawDmDXjsm/niLvw8ZRiU2TRSgBtwGkEzRiIjfEzLCEnATQFJFkl80lfwvNeLDoUM8XHwnmY4ecEXc9sZ2XhAEQRCE8eUHlyL6QYumtOAAAAAASUVORK5CYII=">

            </div>
            <h2 class="ml-4">Ingresa datos del producto</h2>
            <x-danger-enlace class="ml-auto bg-lese-600" href="{{ URL::previous() }}">
                Ir atrás
            </x-danger-enlace>

        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        {{-- <input type="text" class="mt-1 block text-trueGray-900 w-full rounded-md  bg-white  focus:border-gray-500 focus:bg-lese-50 focus:border focus:ring-0 border-none" placeholder="Hola ingresa el texto ca"/> --}}
        {{-- <input type="checkbox" class="form-checkbox rounded text-lese-600" /> --}}
        {{-- <form action="" class="form"> --}}
        {{-- <h1 class="form__title">Sign In</h1> --}}

        {{-- <div class="form__div">
            <textarea class="form__input" style="height: 120px !important;" placeholder=" "></textarea>
            <label for="" class="form__label">Descripción del producto</label>
        </div> --}}
        {{-- <input type="submit" class="form__button" value="Sign In"> --}}
        {{-- </form> --}}

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- name --}}
            <div>
                <div class="form__div mx-2">
                    <input wire:model="name" type="text" class="form__input" placeholder=" "
                        style="{{ $errors->has('name') ? 'border: 1px solid red' : '' }}">
                    <label for="" class="form__label">
                        @if ($errors->has('name'))
                            {{ $errors->first('name') }}
                        @else
                            Nombre*
                        @endif
                    </label>

                </div>

            </div>


            {{-- slug --}}
            <div>
                <div class="form__div mx-2">
                    <input wire:model="slug" type="text" class="form__input" placeholder=" " disabled>
                    <label for="" class="form__label">Slug*
                    </label>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2">
            {{-- description  textarea --}}
            <div class="px-2 mb-2">
                <label for="description" class="text-xs">Descripción *</label>
                <textarea wire:model="description"
                    class="w-full rounded {{ $errors->has('description') ? 'border-red-500' : ' ' }}" cols="30"
                    rows="3" placeholder="Descripción del producto"></textarea>
                <span class="text-sm text-red-500">
                    @if ($errors->has('description'))
                        {{ $errors->first('description') }}
                    @endif
                </span>

            </div>
            <div class="px-2 flex-wrap">
                {{-- extracto null  --}}
                <label for="extracto" class="text-xs">Extracto (150 caracteres)</label>
                <textarea wire:model="extracto" class="w-full rounded mb-2 {{ $errors->has('extracto') ? 'border-red-500' : ' ' }}"
                    cols="30" rows="3" placeholder="Extracto"></textarea>
                <span class="text-sm text-red-500">
                    @if ($errors->has('extracto'))
                        {{ $errors->first('extracto') }}
                    @endif
                </span>
            </div>

        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="form__div mx-2">
                {{-- keywords null --}}
                <input wire:model="keywords" class="form__input" placeholder=" "
                    style="{{ $errors->has('keywords') ? 'border: 1px solid red' : '' }}" />
                <label for="" class="form__label">
                    @if ($errors->has('keywords'))
                        {{ $errors->first('keywords') }}
                    @else
                        Keywords Ej: tornillo, tuerca
                    @endif
                </label>
            </div>

            <div class="form__div mx-2">
                {{-- keywords null --}}
                <input wire:model="referencia" class="form__input"placeholder=" " style="{{ $errors->has('referencia') ? 'border: 1px solid red' : '' }}"/>
                <label for="" class="form__label">
                    @if ($errors->has('referencia'))
                        {{ $errors->first('referencia') }}
                    @else
                        Referencia: AK-011*
                    @endif

                </label>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                {{-- price --}}
                <div class="form__div mx-2">
                    <input wire:model="price" type="text" class="form__input" placeholder=" "
                        style="{{ $errors->has('price') ? 'border: 1px solid red' : '' }}">
                    <label for="" class="form__label">
                        @if ($errors->has('price'))
                            {{ $errors->first('price') }}
                        @else
                            Precio*
                        @endif
                    </label>
                </div>

            </div>
            <div>
                {{-- quantity null --}}
                <div class="form__div mx-2">
                    <input wire:model="quantity" type="text" class="form__input" placeholder=" "
                        style="{{ $errors->has('quantity') ? 'border: 1px solid red' : '' }}">
                    <label for="" class="form__label">
                        @if ($errors->has('quantity'))
                            {{ $errors->first('quantity') }}
                        @else
                            Cantidad
                        @endif
                    </label>
                </div>
            </div>
            <div class="px-2">
                <select wire:model="category_id" class="form-select w-full px-4 py-3 rounded" style="{{ $errors->has('category_id') ? 'border: 1px solid red' : '' }}">
                    <!-- ... -->
                    <option value=" ">Selecione una categoría *</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>

                @if ($errors->has('category_id'))
                   <small class="text-red-500">{{ $errors->first('category_id') }}</small> 
                @endif
            </div>



        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
            {{-- cabeza null perno --}}
            <div class="form__div mx-2">
                <input wire:model="cabeza" type="text" class="form__input" placeholder=" "
                    style="{{ $errors->has('cabeza') ? 'border: 1px solid red' : '' }}">
                <label for="" class="form__label">
                    @if ($errors->has('cabeza'))
                        {{ $errors->first('cabeza') }}
                    @else
                        Cabeza: Hex 19mm, Medialuna, redonda
                    @endif
                </label>
            </div>

            {{-- estria null perno --}}
            <div class="form__div mx-2">
                <input wire:model="estria" type="text" class="form__input" placeholder=" "
                    style="{{ $errors->has('estria') ? 'border: 1px solid red' : '' }}">
                <label for="" class="form__label">
                    @if ($errors->has('estria'))
                        {{ $errors->first('estria') }}
                    @else
                        Estria: Plana, Cónica, 1.5mm
                    @endif
                </label>
            </div>
            {{-- largo null para pernos --}}
            <div class="form__div mx-2">
                <input wire:model="largo" type="text" class="form__input" placeholder=" "
                    style="{{ $errors->has('largo') ? 'border: 1px solid red' : '' }}">
                <label for="" class="form__label">
                    @if ($errors->has('largo'))
                        {{ $errors->first('largo') }}
                    @else
                        Largo: (Pernos, mm)
                    @endif
                </label>
            </div>
            {{-- rosca null perno y tuerca --}}
            <div class="form__div mx-2">
                <input wire:model="rosca" type="text" class="form__input" placeholder=" "
                    style="{{ $errors->has('rosca') ? 'border: 1px solid red' : '' }}">
                <label for="" class="form__label">
                    @if ($errors->has('rosca'))
                        {{ $errors->first('rosca') }}
                    @else
                        Rosca: Perno o tuerca
                    @endif
                </label>
            </div>
            {{-- hex null para tuerca --}}
            <div class="form__div mx-2">
                <input wire:model="hex" type="text" class="form__input" placeholder=" "
                    style="{{ $errors->has('hex') ? 'border: 1px solid red' : '' }}">
                <label for="" class="form__label">
                    @if ($errors->has('hex'))
                        {{ $errors->first('hex') }}
                    @else
                        Hexágono: Tuerca
                    @endif
                </label>
            </div>

            <div class="form__div mx-2">
                <input wire:model="alto" type="text" class="form__input" placeholder=" "
                    style="{{ $errors->has('alto') ? 'border: 1px solid red' : '' }}">
                <label for="" class="form__label">
                    @if ($errors->has('alto'))
                        {{ $errors->first('alto') }}
                    @else
                        Alto: Tuerca
                    @endif
                </label>
            </div>
        </div>
        <div class="flex">
            <div wire:loading wire:target="save" class="mr-4 font-black ml-auto">
                Creando el producto.
            </div>


        </div>

        <div class="flex mt-4 px-2">
            <x-jet-button class="ml-auto" wire:loading.attr="disabled" wire:target="save"
                wire:loading.class.remove="cursor-pointer" wire:click="save">
                Crear Producto
            </x-jet-button>
        </div>
    </div>
    
</div>
