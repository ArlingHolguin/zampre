<x-app-layout>
    <div class="container my-8">
        <div class="my-4">
            {{ $products->links() }}
        </div>
        <ul class="grid grid-cols-1 gap-y-4">
            @forelse ($products as $product )
                <div>
                    <x-card-product-list :product="$product" />
                </div>
                @empty
                <div class="text-center text-gray-600 mt-4">
                    <i class="fas fa-search fa-3x"></i>
                    <p class="mt-4">No se encontraron productos con el término: <span class="font-semibold"> {{ $name }} </span> </p>
                </div>
            @endforelse
        </ul>

        <div class="my-4">
            {{ $products->links() }}
        </div>

    </div>
</x-app-layout>    