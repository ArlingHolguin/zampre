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
        <div class="bg-white rounded-lg shadow-md p-8">
            {{-- categoria y sub categoria  --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Categoria  --}}
                <div>
                    <x-jet-label value="Categoría*" />
                    <select class="form-control w-full uppercase" wire:model="category_id">
                        <option value="" disabled selected>Seleccione una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="category_id" />
                </div> 
                {{-- Sub caregoria  --}}
                <div>
                    <x-jet-label value="Subcategoría*" />
                    <select class="form-control w-full uppercase" wire:model="product.subcategory_id">
                        <option value="" disabled selected>Seleccione una subcategoría</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="product.subcategory_id" />
                </div> 
            </div>
            {{-- nombre y slug  --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                {{-- nombre  --}}
                <div>
                    <x-jet-label value="Título / nombre*" />
                    <x-jet-input type="text" wire:model="product.name" class="form-control w-full"
                        placeholder="Ingrese nombre del producto" />
                    <x-jet-input-error for="product.name" />
                </div>
                {{-- slug  --}}
                <div>
                    <x-jet-label value="Slug*" />
                    <x-jet-input disabled type="text" wire:model="product.slug" class="form-control w-full bg-gray-200 cursor-not-allowed"
                        placeholder="Ingrese slug del producto" />
                    <x-jet-input-error for="product.slug" />
                </div>
            </div>
    
            {{-- descripcion  --}}
            <div class="w-full mt-6" wire:ignore>
                <x-jet-label value="Descripción*" />
                <textarea 
                    x-data 
                    x-init=" ClassicEditor
                    .create( $refs.editor)
                    .then(function(editor){
                        editor.model.document.on('change:data', () => {
                            @this.set('product.description', editor.getData());
                        });
                    })
                    .catch( error => {
                        console.error( error );
                    } );"
                    x-ref="editor"
                    wire:model="product.description" class="form-control w-full" rows="4"
                        placeholder="Ingrese descripción del producto">
                </textarea>
                <x-jet-input-error for="product.description" />
            </div>
            {{-- marca y price  --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                {{-- Brand  --}}
                <div>
                    <x-jet-label value="Marca*" />
                    <select class="form-control w-full uppercase" wire:model="product.brand_id">
                        <option value="" disabled selected>Seleccione una marca</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="product.brand_id" />
                </div> 
    
                {{-- price  --}}
                <div>
                    <x-jet-label value="Precio*" />
                    <x-jet-input type="text" wire:model="product.price" class="form-control w-full"
                        placeholder="Ingrese precio del producto" />
                    <x-jet-input-error for="product.price" />
                </div>

                <div>
                    <x-jet-label value="Referencia(ZAM-00878)*" />
                    <x-jet-input type="text" wire:model="product.referencia" class="form-control w-full"
                        placeholder="Ingrese referencia del producto" />
                    <x-jet-input-error for="product.referencia" />
                </div>
            </div>

            {{-- dimensiones  --}}
            {{-- @json($dimensions) --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">
                <div>
                    <x-jet-label value="Ancho(cm)*" />
                    <x-jet-input type="text" wire:model="product.dimensions.width" class="form-control w-full"
                        placeholder="Ingrese ancho del producto empacado." />
                    <x-jet-input-error for="product.dimensions.width" />
                </div>
                <div>
                    <x-jet-label value="Alto(cm)*" />
                    <x-jet-input type="text" wire:model="product.dimensions.height" class="form-control w-full"
                        placeholder="Ingrese alto del producto empacado." />
                    <x-jet-input-error for="product.dimensions.height" />
                </div>
                <div>
                    <x-jet-label value="Largo(cm)*" />
                    <x-jet-input type="text" wire:model="product.dimensions.length" class="form-control w-full"
                        placeholder="Ingrese largo del producto empacado." />
                    <x-jet-input-error for="product.dimensions.length" />
                </div>
                <div>
                    <x-jet-label value="Peso(Kg)*" />
                    <x-jet-input type="text" wire:model="product.dimensions.weight" class="form-control w-full"
                        placeholder="Ingrese peso del producto empacado." />
                    <x-jet-input-error for="product.dimensions.weight" />
                </div>
            </div>
        </div>
        {{-- Configuracion seo  --}}
        <div class="bg-white rounded-lg shadow-md p-8 mt-4">
            <p>Configuración SEO</p>
            <div class="grid grid-cols-1 mt-6">
                {{-- extracto  --}}
                <div>
                    <x-jet-label value="Extracto" />
                    <textarea type="text" wire:model="product.extracto" class="form-control w-full"
                        placeholder="Ingrese extracto del producto" ></textarea>
                    <x-jet-input-error for="product.extracto" />
                </div> 
                {{-- keywords  --}}
                <div>
                    {{-- @json($keywords) --}}
                    <x-jet-label value="Keywords" />
                    <div class="rounded-lg" style="border: 1px solid #ccc; display: flex; flex-wrap: wrap; align-items: center; ">
                        @foreach ($keywords as $keyword)
                            <span class="ml-2" style="background-color: lightgray; margin-right: 5px; padding: 3px 5px; border-radius: 3px;">
                                {{ $keyword }}
                                <button wire:click="removeKeyword('{{ $keyword }}')" style="background: none; border: none;">x</button>
                            </span>
                        @endforeach
                        <input class="form-control focus:ring-transparent focus:border-transparent" 
                            style="flex: 1; border: none; outline: none;" type="text" 
                            wire:model="input" wire:keydown.enter="addKeyword" placeholder="Ingrese una o varias keyword, coma y enter.">

                    </div>
                    <x-jet-input-error for="product.keywords" />
                </div>               
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
        {{-- Configuracion de stock  --}}
        @if ($this->subcategory)        
            @if (!$this->subcategory->color && !$this->subcategory->color)
                <div class="bg-white px-8 py-4 rounded mt-4">
                    <x-jet-label value="Cantidad*" />
                    <x-jet-input type="text" wire:model="product.quantity" class="form-control w-full"
                        placeholder="Ingrese la cantidad del producto"/>
                    <x-jet-input-error for="product.quantity" />
                </div>
                @elseif ($this->subcategory->size)
                    @livewire('admin.size-product', ['product' => $product], key('size-product-'.$product->id))
                @elseif ($this->subcategory->color)
                    @livewire('admin.color-product', ['product' => $product], key('color-product-'.$product->id))

            @endif  

            @endif
        <div class="flex">
            <div wire:loading wire:target="save" class="mr-4 font-black ml-auto">
                Actualizando ....
            </div>
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

            // size product 
            Livewire.on('deleteSize', sizeId => {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.size-product', 'delete', sizeId);
                    }
                })
            });

            // color prodcut 
            Livewire.on('deletePivot', pivot => {
                Swal.fire({
                    title: "Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.color-product', 'delete', pivot);
                        Swal.fire({
                        title: "Eliminado!",
                        text: "El registro ha sido eliminado.",
                        icon: "success"
                        });
                    }
                    });

            })

            // color size 
            Livewire.on('deleteColorSize', pivot => {
                Swal.fire({
                    title: "Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.color-size', 'delete', pivot);
                        Swal.fire({
                        title: "Eliminado!",
                        text: "El registro ha sido eliminado.",
                        icon: "success"
                        });
                    }
                    });

            })
        </script>
    @endpush
</div>
