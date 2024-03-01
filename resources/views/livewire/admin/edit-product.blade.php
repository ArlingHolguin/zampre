<div class="mb-8 md:mb-2">
    <style>
        /* CHECKBOX TOGGLE SWITCH */
        /* @apply rules for documentation, these do not work as inline style */
        .toggle-checkbox:checked {
            @apply: right-0 border-lese-400;
            right: 0;
            border-color: #ffd200;
        }

        .toggle-checkbox:checked+.toggle-label {
            @apply: bg-lese-400;
            background-color: #ffd200;
        }
    </style>


    <x-slot name="header">
        <div class="flex items-center">
            <div class="inline-block w-12 h-12 text-center rounded-lg bg-lese-500 shadow-soft-2xl">
                <img
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAB90lEQVR4nO2aO0oDURSGP19pDCipfGQFFiKuIG5HK8UF6A4ErXQTgo82lcFitNAFWCjapQko+ECLGSEZb5yZO/eVzPngEMIl+f9z7pkzDwYEQRAEQRD0mAf2gXvgDfh2FK/AHbAHzFnPcgjrwMsQgy7jOfHilBWgW9K4yegmnpywADxYTkgnHoGmxbwBmAUihfgB0LAt3kcj0Uz7iBKPVpgCThWiJ7YEc3Ck8HMBTNsQO1SIXdoSy8mwTTk2LbSrEImAumkhDeqoD8sdUwJrwIdCIPR4B1azkpvMUYBt/La5LjMY6oIn/O9mmVPjv0zkKMAn8bAZRb7I6N48BfjW+I1PCvnNMwPGGimAbwO+cXF6Sx+TRbE6cyrfAVIA3wZ842IGBH3dUPkOkAL4NuCbUAvQSkJ3PTeh3gy1k88NjXXjftP32LZp9Wmpdjlr3bhf1wVo92m1NdYL+Q3xEMjSK7s+QKhD0BlSAN8GfBPi4+6sGWN0BlW+A6QAvg34JsQZUPRiq9RMqHwHSAF8G/BNiDPA6TPEyndAngL0Ut+tv4pWgrS3tHctrhm8vz4Dlk38sWGawDmDXjsm/niLvw8ZRiU2TRSgBtwGkEzRiIjfEzLCEnATQFJFkl80lfwvNeLDoUM8XHwnmY4ecEXc9sZ2XhAEQRCE8eUHlyL6QYumtOAAAAAASUVORK5CYII=">

            </div>
            <h2 class="ml-4  text-sm"> Editar: <span class="font-bold text-md uppercase">{{ $product->referencia }}</span>
            </h2>

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
                    <input wire:model="product.name" type="text" class="form__input" placeholder=" "
                        style="{{ $errors->has('product.name') ? 'border: 1px solid red' : '' }}">
                    <label for="" class="form__label">
                        @if ($errors->has('product.name'))
                            {{ $errors->first('product.name') }}
                        @else
                            Nombre*
                        @endif
                    </label>

                </div>

            </div>


            {{-- slug --}}
            <div>
                <div class="form__div mx-2">
                    <input wire:model="product.slug" type="text" class="form__input" placeholder=" " disabled>
                    <label for="" class="form__label">Slug*
                    </label>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2">
            {{-- description  textarea --}}
            <div class="px-2 mb-2">
                <label for="description" class="text-xs">Descripción *</label>
                <textarea wire:model="product.description"
                    class="w-full rounded {{ $errors->has('producto.description') ? 'border-red-500' : ' ' }}" cols="30"
                    rows="3" placeholder="Descripción del producto"></textarea>
                <span class="text-sm text-red-500">
                    @if ($errors->has('producto.description'))
                        {{ $errors->first('producto.description') }}
                    @endif
                </span>

            </div>
            <div class="px-2 flex-wrap">
                {{-- extracto null  --}}
                <label for="extracto" class="text-xs">Extracto (150 caracteres)</label>
                <textarea wire:model="product.extracto"
                    class="w-full rounded mb-2 {{ $errors->has('product.extracto') ? 'border-red-500' : ' ' }}" cols="30"
                    rows="3" placeholder="Extracto"></textarea>
                <span class="text-sm text-red-500">
                    @if ($errors->has('product.extracto'))
                        {{ $errors->first('product.extracto') }}
                    @endif
                </span>
            </div>

        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="form__div mx-2">
                {{-- keywords null --}}
                <input wire:model="product.keywords" class="form__input"placeholder=" "
                    style="{{ $errors->has('product.keywords') ? 'border: 1px solid red' : '' }}" />
                <label for="" class="form__label">
                    @if ($errors->has('product.keywords'))
                        {{ $errors->first('product.keywords') }}
                    @else
                        Keywords Ej: tornillo, tuerca
                    @endif
                </label>
            </div>

            <div class="form__div mx-2">
                {{-- keywords null --}}
                <input wire:model="product.referencia" class="form__input"placeholder=" "
                    style="{{ $errors->has('producto.referencia') ? 'border: 1px solid red' : '' }}" />
                <label for="" class="form__label">
                    @if ($errors->has('product.referencia'))
                        {{ $errors->first('product.referencia') }}
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
                    <input wire:model="product.price" type="text" class="form__input" placeholder=" "
                        style="{{ $errors->has('product.price') ? 'border: 1px solid red' : '' }}">
                    <label for="" class="form__label">
                        @if ($errors->has('product.price'))
                            {{ $errors->first('product.price') }}
                        @else
                            Precio*
                        @endif
                    </label>
                </div>

            </div>
            <div>
                {{-- quantity null --}}
                <div class="form__div mx-2">
                    <input wire:model="product.quantity" type="text" class="form__input" placeholder=" "
                        style="{{ $errors->has('product.quantity') ? 'border: 1px solid red' : '' }}">
                    <label for="" class="form__label">
                        @if ($errors->has('product.quantity'))
                            {{ $errors->first('product.quantity') }}
                        @else
                            Cantidad
                        @endif
                    </label>
                </div>
            </div>
            <div class="px-2">
                <select wire:model="category_id" class="form-select w-full px-4 py-3 rounded">
                    <!-- ... -->
                    <option value=" ">Selecione una categoría *</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>



        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
            {{-- cabeza null perno --}}
            <div class="form__div mx-2">
                <input wire:model="product.cabeza" type="text" class="form__input" placeholder=" "
                    style="{{ $errors->has('product.cabeza') ? 'border: 1px solid red' : '' }}">
                <label for="" class="form__label">
                    @if ($errors->has('product.cabeza'))
                        {{ $errors->first('product.cabeza') }}
                    @else
                        Cabeza: Hex 19mm, Medialuna, redonda
                    @endif
                </label>
            </div>

            {{-- estria null perno --}}
            <div class="form__div mx-2">
                <input wire:model="product.estria" type="text" class="form__input" placeholder=" "
                    style="{{ $errors->has('product.estria') ? 'border: 1px solid red' : '' }}">
                <label for="" class="form__label">
                    @if ($errors->has('product.estria'))
                        {{ $errors->first('product.estria') }}
                    @else
                        Estria: Plana, Cónica, 1.5mm
                    @endif
                </label>
            </div>
            {{-- largo null para pernos --}}
            <div class="form__div mx-2">
                <input wire:model="product.largo" type="text" class="form__input" placeholder=" "
                    style="{{ $errors->has('product.largo') ? 'border: 1px solid red' : '' }}">
                <label for="" class="form__label">
                    @if ($errors->has('product.largo'))
                        {{ $errors->first('product.largo') }}
                    @else
                        Largo: (Pernos, mm)
                    @endif
                </label>
            </div>
            {{-- rosca null perno y tuerca --}}
            <div class="form__div mx-2">
                <input wire:model="product.rosca" type="text" class="form__input" placeholder=" "
                    style="{{ $errors->has('product.rosca') ? 'border: 1px solid red' : '' }}">
                <label for="" class="form__label">
                    @if ($errors->has('product.rosca'))
                        {{ $errors->first('product.rosca') }}
                    @else
                        Rosca: Perno o tuerca
                    @endif
                </label>
            </div>
            {{-- hex null para tuerca --}}
            <div class="form__div mx-2">
                <input wire:model="product.hex" type="text" class="form__input" placeholder=" "
                    style="{{ $errors->has('product.hex') ? 'border: 1px solid red' : '' }}">
                <label for="" class="form__label">
                    @if ($errors->has('product.hex'))
                        {{ $errors->first('product.hex') }}
                    @else
                        Hexágono: Tuerca
                    @endif
                </label>
            </div>

            <div class="form__div mx-2">
                <input wire:model="product.alto" type="text" class="form__input" placeholder=" "
                    style="{{ $errors->has('product.alto') ? 'border: 1px solid red' : '' }}">
                <label for="" class="form__label">
                    @if ($errors->has('product.alto'))
                        {{ $errors->first('product.alto') }}
                    @else
                        Alto: Tuerca
                    @endif
                </label>
            </div>
        </div>
        <div class="flex">
            <div wire:loading wire:target="save" class="mr-4 font-black ml-auto">
                Actualizando ....
            </div>
        </div>
        <div class="flex justify-end items-center mt-4 px-2">
            <x-jet-action-message class="mr-3" on="saved">
                Actualizado
            </x-jet-action-message>
            <x-jet-button class="" wire:loading.attr="disabled" wire:target="updateProduct"
                wire:loading.class.remove="cursor-pointer" wire:click="updateProduct">
                Actualizar Producto
            </x-jet-button>
        </div>


        <div class="bg-white shadow-lg p-4 my-4 mx-2 rounded-lg">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 ">

                {{-- Imagen del producto una sola --}}
                <div class="mb-4  px-2" wire:ignore>
                    <form action="{{ route('ProductFile', $product) }}" class="dropzone" id="my-great-dropzone"
                        method="POST"></form>
                </div>

                <div class="flex justify-end items-center border-1 rounded-md h-36 mt-1 px-8 mx-2">
                    {{-- status  input tipo radio 1 borrador 2 publicado --}}
                    <div class="bg-trueGray-100 flex w-full mb-6 items-center justify-between rounded h-12 pt-2 px-4">
                        <div>
                            <p class="mb-3">Estado</p>
                        </div>
                        <div class="flex items-center px-2 justify-start mb-2">
                            @livewire(
                                'admin.components.product-status-badge',
                                [
                                    'model' => $product,
                                    'field' => 'status',
                                ],
                                key($product->id),
                            )
                        </div>

                    </div>


                </div>

            </div>
        </div>
       @if ($product->images->count())
        
       <div class="bg-white shadow-lg p-4 my-4 mx-2 rounded-lg">
           
           <p class="font-bold mb-8 mt-1">Imagenes del producto</p>
           <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
               @foreach ($product->images as $image)
                   <div class="flex flex-col items-center justify-center" wire:key="image-.{{$image->id}}">
                       <img class="w-32 h-32 object-cover" src="{{ Storage::url($image->url) }}" alt="{{$product->name}}">
                       <div class="flex justify-center items-center mt-2">
                           <x-jet-danger-button  wire:click="deleteImage({{ $image->id }})" wire:loading.attr="disabled" wire:target="deleteImage({{ $image->id }})">
                               Eliminar
                           </x-jet-danger-button>
                       </div>
                   </div>
               @endforeach
       </div>
       @endif
        

    </div>
    @push('script')
        <script>
            Dropzone.autoDiscover = false;
            document.addEventListener('livewire:load', function() {
                var myDropzone = new Dropzone('#my-great-dropzone', {
                    url: "{{ route('ProductFile', $product) }}",
                    paramName: 'file',
                    maxFilesize: 0.1,
                    maxFiles: 1,
                    acceptedFiles: ".jpeg,.jpg,.png,.gif,.webp",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    dictDefaultMessage: "😎 Subir imagen 🎞",
                    complete:function(file){
                        this.removeFile(file);

                    },
                    queuecomplete:function(){
                        Livewire.emit('refresh');

                    },
                    init: function() {
                        this.on("success", function(file, response) {
                            console.log(response);
                        });
                    }
                });
            });
        </script>
    @endpush
</div>
