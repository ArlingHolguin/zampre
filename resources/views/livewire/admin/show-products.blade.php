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
       <div class="overflow-x-scroll md:overflow-hidden">
           <table class="min-w-max w-full table-auto ">
               <thead>
                   <tr class="bg-trueGray-200 text-trueGray-600 uppercase text-sm leading-normal">
                       <th class="py-3 px-6 text-left">
                           All
                       </th>
                       <th class="py-3 px-6 text-left">Nombre</th>
                       <th class="py-3 px-6 text-center">Referencia</th>
                       <th class="py-3 px-6 text-center">Status</th>
                       <th class="py-3 px-6 text-center">Cant</th>
                       <th class="py-3 px-6 text-center">Precio</th>
                       <th class="py-3 px-6 text-center">Categoría</th>
                       <th class="py-3 px-6 text-center"></th>
                       <th class="py-3 px-6 text-center">Actions</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($products as $product)
                       <tr tabindex="0" class="focus:outline-none h-16 border border-truetrueGray-100 rounded">
                           <td>
                               <div class="ml-5">
                                   <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                       <input type="checkbox" name="toggle" id="toggle-"
                                           class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" />
                                       <label for="toggle"
                                           class="toggle-label block overflow-hidden h-6 rounded-full bg-trueGray-300 cursor-pointer"></label>
                                   </div>
   
                               </div>
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
                                        @livewire('admin.components.product-status-badge', [
                                            'model' => $product,
                                            'field' => 'status'
                                            ], key($product->id))
                                       
                               </div>
                           </td>
                           <td class="pl-5">
                               <div class="flex items-center">
                                  
                                   <p class="text-sm leading-none text-trueGray-600 ml-2">{{ $product->quantity }}</p>
                               </div>
                           </td>
                           <td class="pl-5">
                               <div class="flex items-center">
   
                                   <p class="text-sm leading-none text-trueGray-600 ml-2">$ {{ $product->price }}</p>
                               </div>
                           </td>
                           <td class="pl-5">
                               <button
                                   class="py-3 px-3 text-sm focus:outline-none leading-none text-trueGray-500 bg-lese-100 rounded">{{ $product->category->name }}</button>
                           </td>
                           <td class="pl-4">
                               {{-- <button
                                   class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-trueGray-600 py-3 px-5 bg-trueGray-100 rounded hover:bg-trueGray-200 focus:outline-none">View</button> --}}
                           </td>
                           <td>
                            <div class="mr-2 p-1  rounded cursor-pointer">
                                <a href="{{ route('EditProduct', $product) }}" class="text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                        width="16" height="16" viewBox="0,0,256,256"
                                        style="fill:#000000;">
                                        <g fill="#048618" fill-rule="nonzero" stroke="none"
                                            stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter"
                                            stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                            font-family="none" font-weight="none" font-size="none"
                                            text-anchor="none" style="mix-blend-mode: normal">
                                            <g transform="scale(16,16)">
                                                <path
                                                    d="M12.03125,2.02344c-0.49609,0 -0.96484,0.24609 -1.35547,0.63281l-8.11328,8.07031l-1.35547,4.05859l4.05859,-1.35156l0.08594,-0.08203l8.03516,-7.98438c0.38672,-0.39062 0.62891,-0.85937 0.62891,-1.35547c0,-0.49609 -0.24219,-0.96484 -0.62891,-1.35547c-0.39062,-0.38672 -0.85937,-0.63281 -1.35547,-0.63281zM10.02734,4.71094l1.29297,1.29688l-6.59375,6.55469l-1.9375,0.64453l0.64844,-1.94141z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
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
    {{-- <div class="sm:px-6 w-full">
        <div class="px-4 md:px-10 py-4 md:py-7">
            <div class="flex items-center justify-between">
                <p tabindex="0"
                    class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-trueGray-800">
                    Tasks</p>
                <div
                    class="py-3 px-4 flex items-center text-sm font-medium leading-none text-trueGray-600 bg-trueGray-200 hover:bg-trueGray-300 cursor-pointer rounded">
                    <p>Sort By:</p>
                    <select aria-label="select" class="focus:text-indigo-600 focus:outline-none bg-transparent ml-1">
                        <option class="text-sm text-indigo-800">Latest</option>
                        <option class="text-sm text-indigo-800">Oldest</option>
                        <option class="text-sm text-indigo-800">Latest</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <div class="sm:flex items-center justify-between">
                <div class="flex items-center">
                    <a class="rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800"
                        href=" javascript:void(0)">
                        <div class="py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full">
                            <p>All</p>
                        </div>
                    </a>
                    <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8"
                        href="javascript:void(0)">
                        <div class="py-2 px-8 text-trueGray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                            <p>Done</p>
                        </div>
                    </a>
                    <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8"
                        href="javascript:void(0)">
                        <div class="py-2 px-8 text-trueGray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                            <p>Pending</p>
                        </div>
                    </a>
                </div>
                <button onclick="popuphandler(true)"
                    class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                    <p class="text-sm font-medium leading-none text-white">Add Task</p>
                </button>
            </div>
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <tbody>
                        <tr tabindex="0" class="focus:outline-none h-16 border border-trueGray-100 rounded">
                            <td>
                                <div class="ml-5">
                                    <div
                                        class="bg-trueGray-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative">
                                        <input placeholder="checkbox" type="checkbox"
                                            class="focus:opacity-100 checkbox opacity-0 absolute cursor-pointer w-full h-full" />
                                        <div class="check-icon hidden bg-lese-700 text-white rounded-sm">
                                            <svg class="icon icon-tabler icon-tabler-check"
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="">
                                <div class="flex items-center pl-5">
                                    <p class="text-base font-medium leading-none text-trueGray-700 mr-2">Tuerca para Mazda 6
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                        fill="none">
                                        <path
                                            d="M6.66669 9.33342C6.88394 9.55515 7.14325 9.73131 7.42944 9.85156C7.71562 9.97182 8.02293 10.0338 8.33335 10.0338C8.64378 10.0338 8.95108 9.97182 9.23727 9.85156C9.52345 9.73131 9.78277 9.55515 10 9.33342L12.6667 6.66676C13.1087 6.22473 13.357 5.62521 13.357 5.00009C13.357 4.37497 13.1087 3.77545 12.6667 3.33342C12.2247 2.89139 11.6251 2.64307 11 2.64307C10.3749 2.64307 9.77538 2.89139 9.33335 3.33342L9.00002 3.66676"
                                            stroke="#3B82F6" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path
                                            d="M9.33336 6.66665C9.11611 6.44492 8.8568 6.26876 8.57061 6.14851C8.28442 6.02825 7.97712 5.96631 7.66669 5.96631C7.35627 5.96631 7.04897 6.02825 6.76278 6.14851C6.47659 6.26876 6.21728 6.44492 6.00003 6.66665L3.33336 9.33332C2.89133 9.77534 2.64301 10.3749 2.64301 11C2.64301 11.6251 2.89133 12.2246 3.33336 12.6666C3.77539 13.1087 4.37491 13.357 5.00003 13.357C5.62515 13.357 6.22467 13.1087 6.66669 12.6666L7.00003 12.3333"
                                            stroke="#3B82F6" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </td>
                            <td class="pl-24">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none">
                                        <path
                                            d="M9.16667 2.5L16.6667 10C17.0911 10.4745 17.0911 11.1922 16.6667 11.6667L11.6667 16.6667C11.1922 17.0911 10.4745 17.0911 10 16.6667L2.5 9.16667V5.83333C2.5 3.99238 3.99238 2.5 5.83333 2.5H9.16667"
                                            stroke="#52525B" stroke-width="1.25" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <circle cx="7.50004" cy="7.49967" r="1.66667" stroke="#52525B"
                                            stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></circle>
                                    </svg>
                                    <p class="text-sm leading-none text-trueGray-600 ml-2">AK-01</p>
                                    
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none">
                                        <path d="M7.5 5H16.6667" stroke="#52525B" stroke-width="1.25"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M7.5 10H16.6667" stroke="#52525B" stroke-width="1.25"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M7.5 15H16.6667" stroke="#52525B" stroke-width="1.25"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M4.16669 5V5.00667" stroke="#52525B" stroke-width="1.25"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M4.16669 10V10.0067" stroke="#52525B" stroke-width="1.25"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M4.16669 15V15.0067" stroke="#52525B" stroke-width="1.25"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <p class="text-sm leading-none text-trueGray-600 ml-2">04/07</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none">
                                        <path
                                            d="M3.33331 17.4998V6.6665C3.33331 6.00346 3.59671 5.36758 4.06555 4.89874C4.53439 4.4299 5.17027 4.1665 5.83331 4.1665H14.1666C14.8297 4.1665 15.4656 4.4299 15.9344 4.89874C16.4033 5.36758 16.6666 6.00346 16.6666 6.6665V11.6665C16.6666 12.3295 16.4033 12.9654 15.9344 13.4343C15.4656 13.9031 14.8297 14.1665 14.1666 14.1665H6.66665L3.33331 17.4998Z"
                                            stroke="#52525B" stroke-width="1.25" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M10 9.1665V9.17484" stroke="#52525B" stroke-width="1.25"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M6.66669 9.1665V9.17484" stroke="#52525B" stroke-width="1.25"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M13.3333 9.1665V9.17484" stroke="#52525B" stroke-width="1.25"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <p class="text-sm leading-none text-trueGray-600 ml-2">23</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none">
                                        <path
                                            d="M12.5 5.83339L7.08333 11.2501C6.75181 11.5816 6.56556 12.0312 6.56556 12.5001C6.56556 12.9689 6.75181 13.4185 7.08333 13.7501C7.41485 14.0816 7.86449 14.2678 8.33333 14.2678C8.80217 14.2678 9.25181 14.0816 9.58333 13.7501L15 8.33339C15.663 7.67034 16.0355 6.77107 16.0355 5.83339C16.0355 4.8957 15.663 3.99643 15 3.33339C14.337 2.67034 13.4377 2.29785 12.5 2.29785C11.5623 2.29785 10.663 2.67034 10 3.33339L4.58333 8.75005C3.58877 9.74461 3.03003 11.0935 3.03003 12.5001C3.03003 13.9066 3.58877 15.2555 4.58333 16.2501C5.57789 17.2446 6.92681 17.8034 8.33333 17.8034C9.73985 17.8034 11.0888 17.2446 12.0833 16.2501L17.5 10.8334"
                                            stroke="#52525B" stroke-width="1.25" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                    <p class="text-sm leading-none text-trueGray-600 ml-2">04/07</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <button
                                    class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">Due
                                    today at 18:00</button>
                            </td>
                            <td class="pl-4">
                                <button
                                    class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-trueGray-600 py-3 px-5 bg-trueGray-100 rounded hover:bg-trueGray-200 focus:outline-none">View</button>
                            </td>
                            <td>
                                <div class="relative px-5 pt-2">
                                    <button class="focus:ring-2 rounded-md focus:outline-none"
                                        onclick="dropdownFunction(this)" role="button" aria-label="option">
                                        <svg class="dropbtn" onclick="dropdownFunction(this)"
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M4.16667 10.8332C4.62691 10.8332 5 10.4601 5 9.99984C5 9.5396 4.62691 9.1665 4.16667 9.1665C3.70643 9.1665 3.33334 9.5396 3.33334 9.99984C3.33334 10.4601 3.70643 10.8332 4.16667 10.8332Z"
                                                stroke="#9CA3AF" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M10 10.8332C10.4602 10.8332 10.8333 10.4601 10.8333 9.99984C10.8333 9.5396 10.4602 9.1665 10 9.1665C9.53976 9.1665 9.16666 9.5396 9.16666 9.99984C9.16666 10.4601 9.53976 10.8332 10 10.8332Z"
                                                stroke="#9CA3AF" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M15.8333 10.8332C16.2936 10.8332 16.6667 10.4601 16.6667 9.99984C16.6667 9.5396 16.2936 9.1665 15.8333 9.1665C15.3731 9.1665 15 9.5396 15 9.99984C15 10.4601 15.3731 10.8332 15.8333 10.8332Z"
                                                stroke="#9CA3AF" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                    <div
                                        class="dropdown-content bg-white shadow w-24 absolute z-30 right-0 mr-6 hidden">
                                        <div tabindex="0"
                                            class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                            <p>Edit</p>
                                        </div>
                                        <div tabindex="0"
                                            class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                            <p>Delete</p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="h-3"></tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="./index.js"></script>
    <style>
        .checkbox:checked+.check-icon {
            display: flex;
        }

    </style>
    <script>
        function dropdownFunction(element) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            let list = element.parentElement.parentElement.getElementsByClassName("dropdown-content")[0];
            list.classList.add("target");
            for (i = 0; i < dropdowns.length; i++) {
                if (!dropdowns[i].classList.contains("target")) {
                    dropdowns[i].classList.add("hidden");
                }
            }
            list.classList.toggle("hidden");
        }
    </script> --}}
</div>
