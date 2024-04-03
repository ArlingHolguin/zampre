<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Categorias') }}
        </h2>
    </x-slot>
    <div class="container py-12">
       @livewire('admin.create-category')
    </div>
    @push('script')
    <script>
        Livewire.on('deleteCategory', categorySlug => {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.create-category', 'delete', categorySlug);
                    }
                })
            });
    </script>
        
    @endpush
</x-admin-layout>