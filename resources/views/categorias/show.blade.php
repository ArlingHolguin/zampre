<x-app-layout>
    <div class="bg-top pt-0.5 pb-32 hidden md:block" style="background-image: url('https://i.imgur.com/mR1wXHN.jpg');
        object-fit: contain;">
        <div class="mt-8 flex">
            <img class="h-48 mx-auto" src="https://i.imgur.com/BBmgUIj.png" alt="">
        </div>
        <!-- menu -->
        <nav class="mt-10 flex">
            <ul
                class="triangle-menu bg-black text-lese-900 uppercase font-semibold h-8 inline-flex mx-auto items-center">
                <li class="px-6">
                    <a href="#">
                        <p class="font-black">Inicio</p>
                    </a>
                </li>
                <span>/</span>
                <li class="px-6 ">
                    <a href="#">
                        Nosotros
                    </a>
                </li>
                <span>/</span>
                <li class="px-6">
                    <a href="#">
                        Contacto
                    </a>
                </li>
                <span>/</span>
                <li class="px-6">
                    <a href="#">
                        Registrese
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container py-8">

        @livewire('category-filter', ['category' => $category])

    </div>
</x-app-layout>
