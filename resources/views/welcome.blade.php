<x-app-layout>
    <div class="container">
        @livewire('carousel-home')
        @foreach ($categories as $category)
            <section class="mb-6">
                <div class="bg-orange-600  rounded-lg shadow-lg mb-6 mt-20">
                    <div class="px-6 py-2 flex justify-between items-center">
                        <div class="flex items-center justify-center">
                            <span class="bg-lese-400 rounded-lg h-10 w-10 flex items-center justify-center p-1">
                                @if ($category->icon)
                                <img src="{{ asset('img/' . $category->icon . '.png') }}" width="50" alt="Icono de {{ $category->name }}">
                            @else
                                {{-- Puedes poner un icono por defecto aquí si quieres --}}
                                {{-- <i class="fas fa-heart"></i> --}}
                            @endif
                                
                            </span>
                            <h1 class="ml-2 font-bold text-white uppercase">
                                {{ $category->name }}
                                <span  class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-green-500 rounded-full font-black">
                                    {{ $category->products->count() }}
                                </span>
                            </h1>

                        </div>

                        <div>
                            <a href="{{ route('categories.show', $category) }}"
                                class="uppercase ml-3 text-sm rounded-md text-white font-semibold border border-white px-6 py-1 hover:bg-white hover:text-orange-600">
                                Ver Más
                            </a>
                        </div>

                    </div>
                </div>
                
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

            new Glider(document.querySelector('.glider-carousel'), {
            slidesToShow: 1,
            dots: '.dots',
            draggable: true,
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
            });     
        </script>
    @endpush
</x-app-layout>
