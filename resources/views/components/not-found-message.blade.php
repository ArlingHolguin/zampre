
<div class="md:col-span-2 lg:col-span-4 flex justify-center items-center bg-white rounded-lg shadow-lg p-10">
    <div class="flex flex-col items-center">
        <h1 class="text-5xl font-black text-gray-600 mb-4">Oopss..</h1>
        <img class="w-48" src="{{ asset('img/not_found.svg') }}" alt="not-found">
        <span class="text-lg mt-4 font-medium">{{ $slot }}</span>
    </div>
</div>