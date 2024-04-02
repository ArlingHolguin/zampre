<div>


    <x-slot name="header">
        <div class="flex items-center">
            <div class="inline-block w-12 h-12 text-center rounded-lg bg-lese-500 shadow-soft-2xl">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAB90lEQVR4nO2aO0oDURSGP19pDCipfGQFFiKuIG5HK8UF6A4ErXQTgo82lcFitNAFWCjapQko+ECLGSEZb5yZO/eVzPngEMIl+f9z7pkzDwYEQRAEQRD0mAf2gXvgDfh2FK/AHbAHzFnPcgjrwMsQgy7jOfHilBWgW9K4yegmnpywADxYTkgnHoGmxbwBmAUihfgB0LAt3kcj0Uz7iBKPVpgCThWiJ7YEc3Ck8HMBTNsQO1SIXdoSy8mwTTk2LbSrEImAumkhDeqoD8sdUwJrwIdCIPR4B1azkpvMUYBt/La5LjMY6oIn/O9mmVPjv0zkKMAn8bAZRb7I6N48BfjW+I1PCvnNMwPGGimAbwO+cXF6Sx+TRbE6cyrfAVIA3wZ842IGBH3dUPkOkAL4NuCbUAvQSkJ3PTeh3gy1k88NjXXjftP32LZp9Wmpdjlr3bhf1wVo92m1NdYL+Q3xEMjSK7s+QKhD0BlSAN8GfBPi4+6sGWN0BlW+A6QAvg34JsQZUPRiq9RMqHwHSAF8G/BNiDPA6TPEyndAngL0Ut+tv4pWgrS3tHctrhm8vz4Dlk38sWGawDmDXjsm/niLvw8ZRiU2TRSgBtwGkEzRiIjfEzLCEnATQFJFkl80lfwvNeLDoUM8XHwnmY4ecEXc9sZ2XhAEQRCE8eUHlyL6QYumtOAAAAAASUVORK5CYII=">

            </div>
            <h2 class="ml-4">Ingresa datos del producto</h2>
            <x-danger-enlace class="ml-auto bg-lese-600" href="{{ URL::previous() }}">
                Ir atrás
            </x-danger-enlace>

        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 lg:px-8 py-8">
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
                    <select class="form-control w-full uppercase" wire:model="subcategory_id">
                        <option value="" disabled selected>Seleccione una subcategoría</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="subcategory_id" />
                </div> 
            </div>
            {{-- nombre y slug  --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                {{-- nombre  --}}
                <div>
                    <x-jet-label value="Título / nombre*" />
                    <x-jet-input type="text" wire:model="name" class="form-control w-full"
                        placeholder="Ingrese nombre del producto" />
                    <x-jet-input-error for="name" />
                </div>
                {{-- slug  --}}
                <div>
                    <x-jet-label value="Slug*" />
                    <x-jet-input disabled type="text" wire:model="slug" class="form-control w-full bg-gray-200 cursor-not-allowed"
                        placeholder="Ingrese slug del producto" />
                    <x-jet-input-error for="slug" />
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
                            @this.set('description', editor.getData());
                        });
                    })
                    .catch( error => {
                        console.error( error );
                    } );"
                    x-ref="editor"
                    wire:model="description" class="form-control w-full" rows="4"
                        placeholder="Ingrese descripción del producto">
                </textarea>
                <x-jet-input-error for="description" />
            </div>
            {{-- marca y price  --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                {{-- Brand  --}}
                <div>
                    <x-jet-label value="Marca*" />
                    <select class="form-control w-full uppercase" wire:model="brand_id">
                        <option value="" disabled selected>Seleccione una marca</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="brand_id" />
                </div> 
    
                {{-- price  --}}
                <div>
                    <x-jet-label value="Precio*" />
                    <x-jet-input type="text" wire:model="price" class="form-control w-full"
                        placeholder="Ingrese precio del producto" />
                    <x-jet-input-error for="price" />
                </div>

                <div>
                    <x-jet-label value="Referencia(ZAM-00878)*" />
                    <x-jet-input type="text" wire:model="referencia" class="form-control w-full"
                        placeholder="Ingrese referencia del producto" />
                    <x-jet-input-error for="referencia" />
                </div>
            </div>

            {{-- dimensiones  --}}
            {{-- @json($dimensions) --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">
                <div>
                    <x-jet-label value="Ancho(cm)*" />
                    <x-jet-input type="text" wire:model="dimensions.width" class="form-control w-full"
                        placeholder="Ingrese ancho del producto empacado." />
                    <x-jet-input-error for="dimensions.width" />
                </div>
                <div>
                    <x-jet-label value="Alto(cm)*" />
                    <x-jet-input type="text" wire:model="dimensions.height" class="form-control w-full"
                        placeholder="Ingrese alto del producto empacado." />
                    <x-jet-input-error for="dimensions.height" />
                </div>
                <div>
                    <x-jet-label value="Largo(cm)*" />
                    <x-jet-input type="text" wire:model="dimensions.length" class="form-control w-full"
                        placeholder="Ingrese largo del producto empacado." />
                    <x-jet-input-error for="dimensions.length" />
                </div>
                <div>
                    <x-jet-label value="Peso(Kg)*" />
                    <x-jet-input type="text" wire:model="dimensions.weight" class="form-control w-full"
                        placeholder="Ingrese peso del producto empacado." />
                    <x-jet-input-error for="dimensions.weight" />
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
                    <textarea type="text" wire:model="extracto" class="form-control w-full"
                        placeholder="Ingrese extracto del producto" ></textarea>
                    <x-jet-input-error for="extracto" />
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
                               wire:model="input" wire:keydown.enter="addKeyword(input)" placeholder="Ingrese una o varias keyword, coma y enter.">
                    </div>
                    <x-jet-input-error for="keywords" />
                </div>               
            </div>
        </div>

        {{-- {{ $this->subcategory }} --}}
        @if ($subcategory_id)
            @if (!$this->subcategory->color && !$this->subcategory->color)
                <div class="bg-white px-8 py-4 rounded mt-4">
                    <x-jet-label value="Cantidad*" />
                    <x-jet-input type="text" wire:model="quantity" class="form-control w-full"
                        placeholder="Ingrese la cantidad del producto"/>
                    <x-jet-input-error for="quantity"/>
                </div>
            @endif            
        @endif
        
        <div class="flex mt-4 px-2">
            <x-jet-button class="ml-auto" 
                wire:loading.attr="disabled" 
                wire:target="save"
                wire:loading.class.remove="cursor-pointer" 
                wire:click="save">
                Crear Producto
            </x-jet-button>
        </div>
    </div>
    
</div>
