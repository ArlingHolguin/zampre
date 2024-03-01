<x-app-layout>
    <div class="container py-8">
        @foreach ($categories as $category)
            <section class="mb-6">
                


                <div class="bg-black rounded-lg shadow-lg mb-6 sticky top-16 z-40">
                    <div class="px-6 py-2 flex justify-between items-center">
                        <div class="flex items-center justify-center">
                            <span
                                class="bg-lese-400 rounded-lg h-10 w-10 flex items-center justify-center">{!! $category->icon !!}</span>
                            <h1 class="ml-2 font-bold text-lese-900 uppercase">
                                {{ $category->name }}
                                <span
                                    class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full font-black">{{ $category->products->count() }}</span>
                            </h1>

                        </div>

                        <div>
                            <a href="{{ route('categories.show', $category) }}"
                                class="uppercase ml-3 text-sm rounded-md text-lese-900 font-bold hover:bg-black hover:text-yellow-400  hvr-bounce-in border-2 border-yellow-400 hover:border-black py-1 px-6 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 hover:font-black">
                                Ver Más
                            </a>
                        </div>

                    </div>
                </div>
                {{-- Componente livewire productos por categorias --}}
                @livewire('category-products', ['category' => $category])

            </section>
        @endforeach


    </div>
    @push('script')
        <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [{
                            breakpoint: 500,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,

                            }
                        },
                        {
                            breakpoint: 630,
                            settings: {
                                slidesToShow: 2.5,
                                slidesToScroll: 2,

                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3.5,
                                slidesToScroll: 2,

                            }
                        },
                        {
                            breakpoint: 1080,
                            settings: {
                                slidesToShow: 4.5,
                                slidesToScroll: 4,

                            }
                        },
                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 5.5,
                                slidesToScroll: 5,

                            }
                        },

                    ]
                });

            });
        </script>
    @endpush
</x-app-layout>
