<x-app-layout>
    <div class="bg-top pt-0.5 pb-32 hidden md:block" 
    style="background-image: url('{{ $category->image ?? $category->image }}');
           object-fit: contain; background-color: {{ $category->image ? 'none' : 'white' }};">
       
   <!-- menu -->
   <nav class="mt-10 flex items-center justify-center container">
       <h1 class="text-5xl font-black text-orange-600">{{ $category->name }}</h1>
   </nav>
</div>
    <div class="container py-4">
        @livewire('category-filter', ['category' => $category])
    </div>
</x-app-layout>
