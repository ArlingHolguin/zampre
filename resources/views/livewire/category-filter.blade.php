<div>
    {{-- tarjeta filter --}}
    <div class="bg-white rounded-lg shadow-lg mb-6 sticky top-16 z-40">
        <div class="px-6 py-2 flex justify-between items-center">
            <div class="flex items-center justify-center">
                <span
                    class="bg-lese-400 rounded-lg h-10 w-10 flex items-center justify-center">{!! $category->icon !!}</span>
                <h1 class="ml-2 font-bold text-black uppercase">
                    {{ $category->name }}
                    <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full font-black">{{ $category->products->count() }}</span>
                </h1>

            </div>

            <div class="grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-trueGray-700">
                <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-lese-400 bg-black' : '' }}"
                    wire:click="$set('view', 'grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-lese-400 bg-black' : '' }}"
                    wire:click="$set('view', 'list')"></i>
            </div>

        </div>
    </div>
    {{-- grid 5 columnas --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <aside>
            {{-- {{$subcategoria --}}
            {{-- <h2 class="font-bold text-left capitalize mb-2 text-trueGray-900">Subcategorías</h2> --}}
            <ul class="divide-y divide-gray-200">
                {{-- @foreach ($category->subcategories as $subcategory)
                    <li class="pl-2 py-2 text-sm text-trueGray-900 cursor-pointer hover:bg-trueGray-900 hover:text-greenLime-500 {{ $subcategoria == $subcategory->name ? 'text-greenLime-500 font-bold bg-trueGray-900 py-1 px-2 rounded-lg' : '' }}"
                        wire:click="$set('subcategoria', '{{ $subcategory->name }}')">
                        <a class="font-extrabold hover:font-extrabold capitalize">
                            {{ $subcategory->name }}
                        </a>
                    </li>

                @endforeach --}}
            </ul>
            <style>
                /* Tab content - closed */
                .tab-content {
                    max-height: 0;
                    -webkit-transition: max-height .35s;
                    -o-transition: max-height .35s;
                    transition: max-height .35s;
                }

                /* :checked - resize to full height */
                .tab input:checked~.tab-content {
                    max-height: 300vh;
                }

                /* Label formatting when open */
                .tab input:checked+label {
                    /*@apply text-xl p-5 border-l-2 border-indigo-500 bg-gray-100 text-indigo*/
                    font-size: 1.25rem;
                    /*.text-xl*/
                    padding: 1.25rem;
                    /*.p-5*/
                    border-left-width: 2px;
                    /*.border-l-2*/
                    border-color: #e2df30;
                    /*.border-indigo*/
                    background-color: #f8fafc;
                    /*.bg-gray-100 */
                    color: #000;
                    /*.text-indigo*/
                }

                /* Icon */
                .tab label::after {
                    float: right;
                    right: 0;
                    top: 0;
                    display: block;
                    width: 1.5em;
                    height: 1.5em;
                    line-height: 1.5;
                    font-size: 1.25rem;
                    text-align: center;
                    -webkit-transition: all .35s;
                    -o-transition: all .35s;
                    transition: all .35s;
                }

                /* Icon formatting - closed */
                .tab input[type=checkbox]+label::after {
                    content: "+";
                    font-weight: bold;
                    /*.font-bold*/
                    border-width: 1px;
                    /*.border*/
                    border-radius: 9999px;
                    /*.rounded-full */
                    border-color: #000;
                    /*.border-grey*/
                }

                .tab input[type=radio]+label::after {
                    content: "\25BE";
                    font-weight: bold;
                    /*.font-bold*/
                    border-width: 1px;
                    /*.border*/
                    border-radius: 9999px;
                    /*.rounded-full */
                    border-color: #b8c2cc;
                    /*.border-grey*/
                }

                /* Icon formatting - open */
                .tab input[type=checkbox]:checked+label::after {
                    transform: rotate(315deg);
                    background-color: #e2df30;
                    /*.bg-indigo*/
                    color: #f8fafc;
                    /*.text-grey-lightest*/
                }

                .tab input[type=radio]:checked+label::after {
                    transform: rotateX(180deg);
                    background-color: #e2df30;
                    /*.bg-indigo*/
                    color: #f8fafc;
                    /*.text-grey-lightest*/
                }

            </style>
            <div class="shadow-md ">
                <div class="tab w-full overflow-hidden border-t">
                    <input class="absolute opacity-0 " id="tab-multi-one" type="checkbox" name="tabs">
                    <label class="block py-3 px-4 leading-normal cursor-pointer " for="tab-multi-one">Marcas</label>
                    <div class="tab-content border-l-2 bg-gray-100 border-yellow-500 leading-normal overflow-hidden">
                        <ul class="divide-y divide-gray-200">
                            @foreach ($category->brands as $brand)
                                @if ($brand->status == 2)
                                    {{-- {{$brand->status}}
                {{$category->products->count()}}
                {{$brand->products->count()}} --}}

                                    <li class="flex items-center pl-2 py-2 text-sm text-black cursor-pointer hover:bg-black hover:text-lese-500  {{ $marca == $brand->name ? 'text-lese-500 font-bold bg-black py-1 px-2 rounded-lg' : '' }}"
                                        wire:click="$set('marca', '{{ $brand->name }}')">
                                        {{-- <img class="w-10 h-10 rounded-full " src="{{Storage::url($brand->image)}}" alt="{{ $brand->name }}"> --}}
                                        <button
                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-lese-300 transition mr-2">
                                            <img class="h-8 w-8 rounded-md object-cover items-center"
                                                src="{{ Storage::url($brand->image) }}" alt="{{ $brand->name }}" />
                                        </button>
                                        <a class="font-extrabold hover:font-extrabold capitalize">
                                            {{ $brand->name }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
            <x-jet-button class="mt-4 bg-black text-white hover:text-lese-400 hover:bg-gray-900" wire:click="limpiar">
                <i class="far fa-trash-alt mr-1"></i> Quitar Filtro
            </x-jet-button>

            {{-- <h2 class="font-bold text-left capitalize mb-2 mt-4">Marcas</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->brands as $brand)
                    @if ($brand->status == 2)
                        <li class="flex items-center pl-2 py-2 text-sm text-black cursor-pointer hover:bg-black hover:text-lese-500  {{ $marca == $brand->name ? 'text-lese-500 font-bold bg-black py-1 px-2 rounded-lg' : '' }}"
                            wire:click="$set('marca', '{{ $brand->name }}')">
                            
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-lese-300 transition mr-2">
                                <img class="h-8 w-8 rounded-md object-cover items-center"
                                    src="{{ Storage::url($brand->image) }}" alt="{{ $brand->name }}" />
                            </button>
                            <a class="font-extrabold hover:font-extrabold capitalize">
                                {{ $brand->name }}
                            </a>
                        </li>
                    @endif

                @endforeach
            </ul>
            <x-jet-button class="mt-4 bg-gray-700 text-white hover:text-lese-400 hover:bg-gray-900"
                wire:click="limpiar">
                <i class="far fa-trash-alt mr-1"></i> Quitar Filtro
            </x-jet-button> --}}
        </aside>

        <div class="md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')
                <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <li class="bg-trueGray-100 rounded-lg shadow-lg">
                            <article>
                                <div class="relative">
                                    @if($product->images->count())
                                        <img class="h-48 w-full object-cover object-center rounded-t-lg"
                                            src="{{ Storage::url($product->images->first()->url) }}"
                                            alt="{{ $product->name }}">
                                           @else
                                           <img class="h-48 w-full object-cover object-center rounded-t-lg"
                                            src="{{ asset('img/img-hero.jpg') }}"
                                            alt="{{ $product->name }}">
                                            

                                    @endif
                                    <span class="absolute right-2 top-2 cursor-pointer">

                                        <div class="group cursor-pointer flex float-left">
                                            
                                           <button type="button"  class="flex h-8 w-8 p-2 rounded-full bg-lese-900 hover:bg-lese-300">
                                            <img class="items-center justify-center hvr-bounce-in" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABmJLR0QA/wD/AP+gvaeTAAABnUlEQVQ4jaXUT4iNURjH8c+9DOPPghobCyU2g0kTG03NSizGgpW/JWJhpxRKIrM0YzPDRkoKOwtKjetfUTKSf2VhoRCyULOylMV5bvN2eu/7Ttdv857nnOd8+z3vec6hWtvwDq9xHitq8jVr1rfjObbgC+7jCtbUgXOtjG8DE7hYiEfwCDexeC6wIcxgXwYdy/L248FcoBPYhVYGnSyB7sVUHfQoTkVSKzb9F3QR3mJBCXQJvmFTtucWTle5PIdDMW5DD+MhDmS5JwM4rwrYh2mpzDb0mVRyW0PYio9FWCfqH2yM9U9YLZ3q2Zg7gVF8x28Mh/tK9eMHBvEGA9Kpz0jt0hOlXsZnHO8EakYpL3AmYBsCNiXdmqdSazWxB8ewtAy2EE9wA7sDtt5sE4/hZ8CmsSoHzM/iEbzEddwO0CAO4gOWS//2buSvxddOpcJOPA5n/VKLtDCOa2Yfk76Ie3JAozDuxR3p5MaxOZy9xzLpBv2tclNUr/Q0HYl4HX7hUuasKxhcwKtuYHCvBNYGNUp31GigMN6Bq924ausfMY5U0gzoWzYAAAAASUVORK5CYII=">
                                           </button>

                                        <div class="md:ml-2 opacity-0 w-30 bg-black text-white text-center text-xs rounded-lg py-2 relative justify-top z-50 group-hover:opacity-100 bottom-full  px-3 pointer-events-none">
                                                <ul class="w-28"  style="font-size: 10px">

                                                    
                                                        @switch($product->category->name)
                                                            @case("Pernos")
                                                                <li>Cabeza: {{$product->cabeza}}</li>
                                                                <li>Rosca:  {{$product->rosca}}</li>
                                                                <li>Estría:  {{$product->estria}}</li>
                                                                <li>Largo:  {{$product->largo}}</li>
                                                            @break

                                                            @case("Tuercas")
                                                                <li>Hex:  {{$product->hex}}</li>
                                                                <li>Rosca:  {{$product->rosca}} </li>
                                                                <li>Alto:  {{$product->alto}}</li>
                                                            @break
                                                            @case("Tornillos de Culata")
                                                                <li>Cabeza:  {{$product->cabeza}}</li>
                                                                <li>Rosca:  {{$product->rosca}} </li>
                                                                <li>Largo:  {{$product->largo}}</li>
                                                            @break

                                                            @default
                                                            {{$product->category->name}}
                                                        @endswitch
                                                </ul>

                                            </div>
                                        </div>


                                    </span>

                                </div>
                                <div class="py-4 px-6 text-trueGray-300">
                                    <h1
                                        class="text-md font-semibold text-trueGray-900 hover:text-trueGray-700 hover:font-bold hvr-bounce-in cursor-pointer">
                                        <span class="text-xs px-2">{{ Str::limit($product->name, 15) }}</span>
                                    </h1>
                                    <p class="text-xs text-black font-black bg-yellow-400 px-2 py-1 rounded-lg">Ref:
                                        <span class="font-bold uppercase">{{ $product->referencia }}</span>
                                    </p>
                                    {{-- <p class="text-sm font-bold">COP${{ number_format($product->price) }}</p> --}}
                                </div>

                            </article>

                            @livewire('add-cart-item', ['product' => $product])


                        </li>
                    @endforeach
                </ul>
            @else
                <ul>
                    @foreach ($products as $product)
                        <li class="bg-gray-50 rounded-lg shadow-md mb-4">
                            <article class="flex">
                                <figure>
                                   @if ($product->images->count())                                    
                                   <img class="h-48 w-48 object-cover object-center rounded-l-md"
                                       src="{{ Storage::url($product->images->first()->url) }}"
                                       alt="{{ $product->name }}">
                                       @else
                                       <img class="h-48 w-48 object-cover object-center rounded-l-md"
                                       src="{{ asset('img/img-hero.jpg')}}"
                                       alt="{{ $product->name }}">
                                   @endif
                                </figure>
                                <div class="flex-1 py-4 px-6 flex flex-col">
                                    <div class="flex justify-between">
                                        <div>
                                            <h1 class="text-sm md:text-lg font-semibold text-gray-700">
                                                {{ $product->name }}
                                            </h1>
                                            <p class="text-xs uppercase font-black">REF: {{ $product->referencia }}
                                            </p>

                                            {{-- <p class="font-bold text-gray-700 text-sm md:text-md">
                                                COP$ {{ number_format($product->price) }}
                                            </p> --}}
                                        </div>

                                        {{-- computardor --}}
                                        <div class="hidden md:block ">
                                            <div class="flex items-center">

                                                {{-- {{ $product->brands }} --}}

                                                <div class="flex -space-x-1 overflow-hidden">
                                                    @foreach ($product->brands as $brand)
                                                       @if ($brand->image)
                                                        <img class="inline-block h-8  w-8 rounded-full ring-2 ring-white  bg-white  "
                                                            src="{{ Storage::url($brand->image) }}"
                                                            alt="{{ $brand->name }}">
                                                        
                                                       @endif
                                                    @endforeach
                                                </div>

                                                <span
                                                    class="ml-1 mb-2 flex h-4 w-4 text-xs rounded-full bg-black text-lese-900 items-center justify-center">{{ $product->brands->count() }}</span>

                                            </div>



                                        </div>





                                    </div>
                                    {{-- mobil --}}
                                    <div class="block md:hidden mt-6">
                                        <div class="flex items-center">
                                            <div class="flex -space-x-1 overflow-hidden">
                                                @foreach ($product->brands as $brand)
                                                    <img class="inline-block h-8  w-8 rounded-full ring-2 ring-white  bg-white  "
                                                        src="{{ Storage::url($brand->image) }}"
                                                        alt="{{ $brand->name }}">
                                                @endforeach
                                            </div>
                                            <span
                                                class="ml-1 mb-2 flex h-4 w-4 text-xs rounded-full bg-black text-lese-900 items-center justify-center">{{ $product->brands->count() }}</span>

                                        </div>

                                    </div>

                                    <div class="mt-auto hidden md:block">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>

            @endif

            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
