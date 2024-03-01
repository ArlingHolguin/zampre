<div wire:init="loadPosts">
    @if (count($products))
        <div class="glider-contain">
            <ul class="glider-{{ $category->id }}">
                @foreach ($products as $product)
                    <li class="bg-black rounded-lg shadow-lg {{ $loop->last ? '' : 'mr-4' }} ">
                        <article>
                            <figure>
                                <img class="h-48 w-full object-cover object-center rounded-t-lg shadow-lg shadow-gray-100/50"
                                    src="{{ Storage::url($product->images->first()->url) }}"
                                    alt="{{ $product->name }}">
                            </figure>
                            <div class="py-4 px-6 text-white">
                                <h1 class="text-md font-semibold hover:text-lese-900 hover:font-bold hvr-bounce-in">
                                    <a
                                        href="{{ route('products.show', $product) }}">{{ Str::limit($product->name, 15) }}</a>
                                </h1>
                                <p class="text-sm font-bold">REF: {{ ($product->referencia) }}</p>
                            </div>
                        </article>

                    </li>
                @endforeach
            </ul>

            <button aria-label="Previous" class="glider-prev hvr-bounce-in hvr-icon-back">
                <span class="bg-black rounded-full h-10 w-10 flex items-center justify-center text-xl ">
                    <i class="fas fa-angle-left text-lese-900 hvr-icon"></i>
                </span>
            </button>
            <button aria-label="Next" class="glider-next hvr-bounce-in hvr-icon-forward">
                <span class="bg-black rounded-full h-10 w-10 flex items-center justify-center text-xl ">
                    <i class="fas fa-angle-right text-lese-900 hvr-icon"></i>
                </span>

            </button>
            <style>
                .glider-dot {
                    color: rgb(0, 0, 0) !important;
                    background: rgb(0, 0, 0) !important;
                }

                .glider-dot:hover {
                    color: rgba(163, 230, 53) !important;
                    background: rgba(163, 230, 53) !important;


                }

            </style>
            {{-- <div>
                <div role="tablist" class="dots"></div>
            </div> --}}




        </div>

    @else
        <div class="grid grid-cols-2 md:grid-cols-5 gap-1">
            <div >
                <section class="mx-1 w-48 bg-slate-100 rounded-2xl px-8 py-6 shadow-lg">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-400 text-sm">...</span>
                        <span class="text-lese-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </span>
                    </div>
                    <div class="mt-6 w-fit mx-auto">
                        <div class="rounded-full bg-slate-200 h-16 w-16  hvr-icon-pulse-shrink"></div>
                    </div>

                    <div class="mt-8 ">
                        <div class="h-2 bg-slate-200 rounded col-span-2"></div>

                        <p class="text-lese-400 font-semibold mt-2.5">
                        <div class="h-2 bg-slate-200 rounded col-span-2"></div>

                        </p>

                        <div class="h-1 w-full bg-black mt-8 rounded-full">
                            <div class="h-1 rounded-full w-2/5 bg-lese-500 "></div>
                        </div>
                        <div class="mt-3 text-white text-sm">
                            <span class="text-gray-400 font-semibold">Cargando</span>
                            <span class="text-lese-900 font-semibold">{{$d=mt_rand(30,100);}}%</span>
                        </div>

                </section>
            </div>
            <div >
                <section class="mx-1 w-48 bg-slate-100 rounded-2xl px-8 py-6 shadow-lg">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-400 text-sm">...</span>
                        <span class="text-lese-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </span>
                    </div>
                    <div class="mt-6 w-fit mx-auto">
                        <div class="rounded-full bg-slate-200 h-16 w-16  hvr-icon-pulse-shrink"></div>
                    </div>

                    <div class="mt-8 ">
                        <div class="h-2 bg-slate-200 rounded col-span-2"></div>

                        <p class="text-lese-400 font-semibold mt-2.5">
                        <div class="h-2 bg-slate-200 rounded col-span-2"></div>

                        </p>

                        <div class="h-1 w-full bg-black mt-8 rounded-full">
                            <div class="h-1 rounded-full w-2/5 bg-lese-500 "></div>
                        </div>
                        <div class="mt-3 text-white text-sm">
                            <span class="text-gray-400 font-semibold">Cargando</span>
                            <span class="text-lese-900 font-semibold">{{$d=mt_rand(30,80);}}%</span>
                        </div>

                </section>
            </div>
            <div >
                <section class="mx-1 w-48 bg-slate-100 rounded-2xl px-8 py-6 shadow-lg">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-400 text-sm">...</span>
                        <span class="text-lese-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </span>
                    </div>
                    <div class="mt-6 w-fit mx-auto">
                        <div class="rounded-full bg-slate-200 h-16 w-16  hvr-icon-pulse-shrink"></div>
                    </div>

                    <div class="mt-8 ">
                        <div class="h-2 bg-slate-200 rounded col-span-2"></div>

                        <p class="text-lese-400 font-semibold mt-2.5">
                        <div class="h-2 bg-slate-200 rounded col-span-2"></div>

                        </p>

                        <div class="h-1 w-full bg-black mt-8 rounded-full">
                            <div class="h-1 rounded-full w-2/5 bg-lese-500 "></div>
                        </div>
                        <div class="mt-3 text-white text-sm">
                            <span class="text-gray-400 font-semibold">Cargando</span>
                            <span class="text-lese-900 font-semibold">{{$d=mt_rand(10,100);}}%</span>
                        </div>

                </section>
            </div>
            <div >
                <section class="mx-1 w-48 bg-slate-100 rounded-2xl px-8 py-6 shadow-lg">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-400 text-sm">...</span>
                        <span class="text-lese-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </span>
                    </div>
                    <div class="mt-6 w-fit mx-auto">
                        <div class="rounded-full bg-slate-200 h-16 w-16  hvr-icon-pulse-shrink"></div>
                    </div>

                    <div class="mt-8 ">
                        <div class="h-2 bg-slate-200 rounded col-span-2"></div>

                        <p class="text-lese-400 font-semibold mt-2.5">
                        <div class="h-2 bg-slate-200 rounded col-span-2"></div>

                        </p>

                        <div class="h-1 w-full bg-black mt-8 rounded-full">
                            <div class="h-1 rounded-full w-2/5 bg-lese-500 "></div>
                        </div>
                        <div class="mt-3 text-white text-sm">
                            <span class="text-gray-400 font-semibold">Cargando</span>
                            <span class="text-lese-900 font-semibold">{{$d=mt_rand(40,60);}}%</span>
                        </div>

                </section>
            </div>
            <div >
                <section class="mx-1 w-48 bg-slate-100 rounded-2xl px-8 py-6 shadow-lg">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-400 text-sm">...</span>
                        <span class="text-lese-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </span>
                    </div>
                    <div class="mt-6 w-fit mx-auto">
                        <div class="rounded-full bg-slate-200 h-16 w-16  hvr-icon-pulse-shrink"></div>
                    </div>

                    <div class="mt-8 ">
                        <div class="h-2 bg-slate-200 rounded col-span-2"></div>

                        <p class="text-lese-400 font-semibold mt-2.5">
                        <div class="h-2 bg-slate-200 rounded col-span-2"></div>

                        </p>

                        <div class="h-1 w-full bg-black mt-8 rounded-full">
                            <div class="h-1 rounded-full w-2/5 bg-lese-500 "></div>
                        </div>
                        <div class="mt-3 text-white text-sm">
                            <span class="text-gray-400 font-semibold">Cargando</span>
                            <span class="text-lese-900 font-semibold">{{$d=mt_rand(23,35);}}%</span>
                        </div>

                </section>
            </div>

        </div>

    @endif

</div>
