<div>
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
        <div class="flex items-center h-16 justify-between md:justify-start gap-2">
            <div>
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-lese-500 shadow-soft-2xl">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAB90lEQVR4nO2aO0oDURSGP19pDCipfGQFFiKuIG5HK8UF6A4ErXQTgo82lcFitNAFWCjapQko+ECLGSEZb5yZO/eVzPngEMIl+f9z7pkzDwYEQRAEQRD0mAf2gXvgDfh2FK/AHbAHzFnPcgjrwMsQgy7jOfHilBWgW9K4yegmnpywADxYTkgnHoGmxbwBmAUihfgB0LAt3kcj0Uz7iBKPVpgCThWiJ7YEc3Ck8HMBTNsQO1SIXdoSy8mwTTk2LbSrEImAumkhDeqoD8sdUwJrwIdCIPR4B1azkpvMUYBt/La5LjMY6oIn/O9mmVPjv0zkKMAn8bAZRb7I6N48BfjW+I1PCvnNMwPGGimAbwO+cXF6Sx+TRbE6cyrfAVIA3wZ842IGBH3dUPkOkAL4NuCbUAvQSkJ3PTeh3gy1k88NjXXjftP32LZp9Wmpdjlr3bhf1wVo92m1NdYL+Q3xEMjSK7s+QKhD0BlSAN8GfBPi4+6sGWN0BlW+A6QAvg34JsQZUPRiq9RMqHwHSAF8G/BNiDPA6TPEyndAngL0Ut+tv4pWgrS3tHctrhm8vz4Dlk38sWGawDmDXjsm/niLvw8ZRiU2TRSgBtwGkEzRiIjfEzLCEnATQFJFkl80lfwvNeLDoUM8XHwnmY4ecEXc9sZ2XhAEQRCE8eUHlyL6QYumtOAAAAAASUVORK5CYII=">


                </div>
            </div>
            <div class="flex-1">
                    {{-- <x-jet-input class="w-full" wire:model="search"
                        placeholder="Buscar producto por nombre o referencia" type="text" /> --}}
                        {{-- <input class="w-full " type="text" wire:model="prueba">
                        <p>Prueba: {{ $prueba}}</p> --}}
                
            </div>
            <div>
              
            </div>
            <div>
                <x-danger-enlace class="ml-auto bg-lese-600" href="{{ route('CreateProducts') }}">
                    Agregar producto
                </x-danger-enlace>
            </div>
            @livewire('admin.components.exportable-data-table-component')

        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8 ">
        <div class="mb-2 ml-2 mr-2">
            <x-jet-input class="w-full" wire:model="search" placeholder="🚀 Buscar producto por nombre, referencia o precio." type="text" />
        </div>
       @if ($products->count())
       <div class="overflow-x-scroll">
           <table class="min-w-max w-full table-auto ">
               <thead>
                   <tr class="bg-trueGray-200 text-trueGray-600 uppercase text-sm leading-normal">
                       <th class="py-3 px-6 text-left ml-4">
                            <input type="checkbox" wire:model="selectAll">
                            Todo
                       </th>
                       <th class="py-3 px-6 text-left">Nombre</th>
                       <th class="py-3 px-6 text-center">Referencia</th>
                       <th class="py-3 px-6 text-center">Status</th>
                       <th class="py-3 px-6 text-center">Stock</th>
                       <th class="py-3 px-6 text-center">Precio</th>
                       <th class="py-3 px-6 text-center">Precio Descuento</th>
                       <th class="py-3 px-6 text-center">% Desc.</th>
                       <th class="py-3 px-6 text-center">Envío</th>
                       <th class="py-3 px-6 text-center">Categoría</th>
                       <th class="py-3 px-6 text-center"></th>
                       <th class="py-3 px-6 text-center">Actions</th>
                   </tr>
               </thead>
               <tbody>
                <div class="flex items-center gap-8 w-full mt-4 mb-8">
                    @if(count($selectedProducts) > 0)
                        {{-- <input type="number" wire:model="discountPercent"> --}}
                        <div class="flex flex-col gap-y-2 w-full">
                            <div>
                                <x-jet-label value="% descuento*" />
                                <x-jet-input type="number" wire:model="discountPercent" class="form-control w-full"
                                    placeholder="Ingrese el % de descuento" />
                                <x-jet-input-error for="discountPercent" />
                            </div> 
                            <x-jet-button wire:click="updateDiscount">
                                Actualizar % Descuento
                            </x-jet-button>
                        </div>
                    
                        <div class="flex flex-col gap-y-2 w-full">
                            <x-jet-label value="Envio*" class="-mb-2"/>
                            <select wire:model="freeShipping" class="form-control w-full">
                                <option value="1">Envío Gratis</option>
                                <option value="0">Con Costo</option>
                            </select>
                            <x-jet-input-error for="freeShipping" />
                            <x-jet-button wire:click="updateFreeShipping">
                                Actualizar Envío
                            </x-jet-button>
                        </div>

                        <div class="flex flex-col gap-y-2 w-full">
                            <div>
                                <x-jet-label value="Aumente o baja los precios en %*" />
                                <x-jet-input type="number" wire:model="increasePercent" class="form-control w-full"
                                    placeholder="Ingrese el % (ej: -50 o 50)" />
                                <x-jet-input-error for="increasePercent" />
                            </div> 
                            <x-jet-button wire:click="updatePrice">
                                Actualizar Precio
                            </x-jet-button>
                        </div>

                        <x-jet-button wire:click="deleteProducts"  class="bg-red-500 hover:bg-red-600">
                            Eliminar seleccionados
                        </x-jet-button>
                    @endif
                    <div class="w-full flex justify-end">
                        <select class="form-control" wire:model="perPage">
                            <option value="10">10 por página</option>
                            <option value="20">20 por página</option>
                            <option value="30">30 por página</option>
                            <option value="50">50 por página</option>
                            <option value="100">100 por página</option>
                        </select>
                    </div>
                </div>
                
                   @foreach ($products as $product)
                       <tr tabindex="0" class="focus:outline-none h-16 border border-truetrueGray-100 rounded">
                           <td>
                                <input class="ml-6" type="checkbox" wire:model="selectedProducts" value="{{ $product->id }}">
                           </td>
                           <td class="">
                               <div class="flex items-center justify-left pl-5">
                                <span class="text-xs font-bold text-trueGray-600 mr-2">{{$product->id}} - </span>
                                   <p class="text-sm font-medium leading-none text-trueGray-700 mr-2">
                                       {{ $product->name }}</p>
                               </div>
                           </td>
                           <td class="pl-10">
                               <div class="flex items-center">
                                   <p class="text-sm leading-none text-trueGray-600 ml-2 uppercase font-extrabold">{{ $product->referencia }}</p>
   
                               </div>
                           </td>
                           <td class="pl-5">
                               <div class="flex items-center">
                                        @livewire('admin.components.product-status-badge', 
                                            [
                                            'model' => $product, // Instancia de App\Models\Product
                                            'field' => 'status', // Campo 'status' en lugar de 'isActive'
                                        ], key($product->id))

                                        {{-- @livewire('admin.toggle-product-status', ['product' => $product], key($product->id)) --}}
                                       
                               </div>
                           </td>
                           <td class="pl-5">
                               <div class="flex items-center">
                                  
                                   <p class="text-sm leading-none text-trueGray-600 ml-2">{{ $product->stock }}</p>
                               </div>
                           </td>
                           <td class="pl-5">
                               <div class="flex items-center">   
                                   <p class="text-sm leading-none text-trueGray-600 ml-2">$ {{ $product->price }}</p>
                               </div>
                           </td>
                           <td class="pl-5">
                            <div class="flex items-center">   
                                <p class="text-sm leading-none text-trueGray-600 ml-2">$ {{ $product->price_discount }}</p>
                            </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">   
                                    <p class="text-sm leading-none text-trueGray-600 ml-2"> {{ $product->price_discount_percent }}%</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">   
                                    <p class="text-sm leading-none text-trueGray-600 ml-2">{{ $product->free_shipping ? 'Gratis' : 'Con costo' }}</p>
                                </div>
                            </td>
                           <td class="pl-5">
                               <button class="py-3 px-3 text-sm focus:outline-none leading-none text-trueGray-500 bg-lese-100 rounded">
                                {{ $product->subcategory->category->name }}
                            </button>
                           </td>
                           <td class="pl-4">
                               {{-- <button
                                   class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-trueGray-600 py-3 px-5 bg-trueGray-100 rounded hover:bg-trueGray-200 focus:outline-none">View</button> --}}
                           </td>
                           <td>
                            <div class="mr-2 p-1  rounded cursor-pointer">
                                <a href="{{ route('EditProduct', $product) }}" class="text-sm bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-700">
                                    Editar
                                </a>
                            </div>
   
                           </td>
                       </tr>
                       {{-- <tr class="h-3">
                           <td colspan="6" class="border-b border-gray-200">
                               {{$links}}
                           </td>
                       </tr> --}}
                   @endforeach
   
               </tbody>
               <tfoot class="mt-1 mb-1 ">
                   <div class="p-2">
   
                       {{ $products->links() }}
                   </div>
               </tfoot>
   
           </table>        

       </div>
       @else
        <div class="bg-lese-100 text-trueGray-600  text-sm leading-normal p-2 rounded">
            <p class=" text-gray-500">No se encontraron resultados</p>
        </div>
       @endif
    </div>
</div>
