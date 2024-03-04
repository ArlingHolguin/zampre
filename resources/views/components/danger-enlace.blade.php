<a {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-trueGray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:text-lese-400 hover:bg-trueGray-900 focus:outline-none focus:border-lese-400 focus:ring focus:ring-lese-200 active:bg-lese-600 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</a>