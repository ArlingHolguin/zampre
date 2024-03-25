
 <div class="flex justify-center items-center">
    
    <div class="mr-2">
        <span class="rounded-full px-4 py-1 text-xs {{ $status ? ' bg-green-200  text-green-900 ' : 'bg-red-200 text-red-900  ' }}">{{ $status ? 'PUBLICADO' : 'BORRADOR'}}</span>
    </div>
    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">        
        <input wire:model="status" type="checkbox" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" />
        <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-trueGray-300 cursor-pointer"></label>
    </div>
</div> 
{{-- <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" id="switchOne" checked="" wire:model.live="status">
 </div> --}}