@props(['category'])
<div class="col-span-3 bg-orange-400 p-4">
    <ul>
        <h2 class="text-white">Subcategorias</h2>
        @foreach ($category->subcategories as $subcategory)
            <a href="" class="text-white ">
                <li class="hover:text-gray-100 font-bold hover:bg-orange-600 px-2 py-1 hover:font-black transition ease-in-out delay-100 hover:-translate-x-1 hover:scale-110 duration-300">
                    {{ $subcategory->name }}
                </li>
            </a>
        @endforeach
    </ul>
</div>