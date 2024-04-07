<div>
    <footer class="bg-orange-800 py-4">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center justify-between">
                <div class="w-full px-4 md:w-6/12">
                    <div class="py-1 text-sm font-semibold text-white">
                        © {{ date('Y') }} <a href="/" class="text-white hover:text-gray-400">Zampre Online </a>
                        | Todos los derechos reservados. |
                        <span class="text-xs font-thin">Con amor 🖤 by <a href="https://arling.me" target="__blank">Arling.me</a> </span>
                    </div>
                </div>
                <div class="w-full px-4 text-right md:w-6/12">
                    <ul class="flex list-none flex-wrap justify-end">
                        @if(!empty($socialLinks['instagram']['url']))
                            <li>
                                <a href="{{ $socialLinks['instagram']['url'] }}" target="_blank" class="block px-3 py-1 text-sm font-semibold text-white hover:text-gray-400">
                                    <x-instagram size="30px" color="white"/>
                                </a>
                            </li>
                        @endif
                        @if(!empty($socialLinks['facebook']['url']))
                            <li>
                                <a href="{{ $socialLinks['facebook']['url'] }}" target="_blank" class="block px-3 py-1 text-sm font-semibold text-white hover:text-gray-400">
                                    <x-facebook size="30px" color="white"/>
                                </a>
                            </li>
                        @endif
                        @if(!empty($socialLinks['whatsapp']['url']))
                            <li>
                                <a href="{{ 'https://wa.me/57'.$socialLinks['whatsapp']['url'] }}" target="_blank" class="block px-3 py-1 text-sm font-semibold text-white hover:text-gray-400">
                                    <x-whatsapp size="30px" color="white"/>
                                </a>
                            </li>
                        @endif
                    </ul>

                </div>
            </div>
        </div>
    </footer>
</div>
