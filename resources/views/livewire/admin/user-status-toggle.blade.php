<div>
    <button wire:click="toggleStatus" class="bg-blue-500 text-white px-2 py-1 rounded">
        @if ($user->profile->status)
            Desactivar
        @else
            Activar
        @endif
    </button>
</div>

