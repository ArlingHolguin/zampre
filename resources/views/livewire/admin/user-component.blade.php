<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Usuarios') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8 ">
        <div class="mb-2 ml-2 mr-2">
            <x-jet-input class="w-full" wire:model="search" placeholder="🚀 Buscar usuario por nombre o email." type="text" />
        </div>
       @if ($users->count())
       <div class="overflow-x-scroll">
           <table class="min-w-max w-full table-auto ">
               <thead>
                   <tr class="bg-trueGray-200 text-trueGray-600 uppercase text-sm leading-normal">
                       
                       <th class="py-3 px-6 text-left">Nombre</th>
                       <th class="py-3 px-6 text-center">Email</th>
                       <th class="py-3 px-6 text-center">Status</th>
                       <th class="py-3 px-6 text-center">Role</th>
                       <th class="py-3 px-6 text-center">Celular</th>
                       <th class="py-3 px-6 text-center">Actions</th>
                   </tr>
               </thead>
               <tbody>
                
                
                   @foreach ($users as $user)
                       <tr tabindex="0" class="focus:outline-none h-16 border border-truetrueGray-100 rounded">
                          
                           <td class="">
                               <div class="flex items-center justify-left pl-5">
                                <span class="text-xs font-bold text-trueGray-600 mr-2">{{$user->id}} - </span>
                                   <p class="text-sm font-medium leading-none text-trueGray-700 mr-2">
                                       {{ $user->name }}</p>
                               </div>
                           </td>
                           <td class="pl-10">
                               <div class="flex items-center">
                                   <p class="text-sm leading-none text-trueGray-600 ml-2 uppercase font-extrabold">{{ $user->email }}</p>
   
                               </div>
                           </td>
                           <td class="pl-5">
                               <div class="flex items-center">
                                <p class="text-sm leading-none text-trueGray-600 ml-2">
                                    @livewire(
                                        'admin.toggle-switch',
                                        [
                                            'model' => $user,
                                            'field' => 'status',
                                        ],
                                        key($user->id),
                                    )
                                </p>
                                
                                       
                               </div>
                           </td>
                           <td class="pl-5">
                               <div class="flex items-center">
                                  
                                   <p class="text-sm leading-none text-trueGray-600 ml-2">
                                        @if ($user->getRoleNames()->isNotEmpty())
                                            {{ ( $user->getRoleNames()) }}
                                        @else
                                            Usuario Regular
                                        @endif
                                    </p>
                               </div>
                           </td>
                           <td class="pl-5">
                               <div class="flex items-center">   
                                <p class="text-sm leading-none text-trueGray-600 ml-2">
                                    {{ $user->profile ? ($user->profile->phone ? $user->profile->phone : 'N/A') : 'N/A' }}
                                </p>
                               </div>
                           </td>
                           <td>
                            <div class="mr-2 p-1  rounded cursor-pointer">
                                <a wire:click="edit({{ $user->id }})" class="text-sm bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-700">
                                    <i class="fas fa-user-plus"></i> Role
                                </a>
                            </div>
   
                           </td>
                       </tr>
                   @endforeach
   
               </tbody>
               <tfoot class="mt-1 mb-1 ">
                   <div class="p-2">
                        @if ($users->hasPages())
                            {{ $users->links() }}                            
                        @endif
                   </div>
               </tfoot>
   
           </table>        

       </div>
       @else
        <div class=" text-trueGray-600  text-sm leading-normal p-2 rounded">
            <x-not-found-message>
                😑 No se encontraron usuarios para esta búsqueda.                            
            </x-not-found-message>
        </div>
       @endif
    </div>

    {{-- Modal editar user  --}}
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Asignar role
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Role" />
                <select wire:model="role" class="form-select w-full">
                    <option disabled value="null" >Seleccione un role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="role" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-4" wire:click="save">
                Asignar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
