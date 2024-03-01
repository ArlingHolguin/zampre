<a {{ $attributes->merge(['class' => 'mt-3 inline-flex items-center justify-center px-4 py-1 bg-trueGray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:text-black hover:bg-lese-600 focus:outline-none focus:border-lese-700 focus:ring focus:ring-lese-200 active:bg-lese-600 disabled:opacity-25 transitions']) }}>
    {{ $slot }}
</a>