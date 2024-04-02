<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
    {{-- name --}}
    <div>
        <div class="form__div mx-2">
            <input wire:model="name" type="text" class="form__input" placeholder=" "
                style="{{ $errors->has('name') ? 'border: 1px solid red' : '' }}">
            <label for="" class="form__label">
                @if ($errors->has('name'))
                    {{ $errors->first('name') }}
                @else
                    Nombre*
                @endif
            </label>

        </div>

    </div>


    {{-- slug --}}
    <div>
        <div class="form__div mx-2">
            <input wire:model="slug" type="text" class="form__input" placeholder=" " disabled>
            <label for="" class="form__label">Slug*
            </label>
        </div>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2">
    {{-- description  textarea --}}
    <div class="px-2 mb-2">
        <label for="description" class="text-xs">Descripción *</label>
        <textarea wire:model="description"
            class="w-full rounded {{ $errors->has('description') ? 'border-red-500' : ' ' }}" cols="30"
            rows="3" placeholder="Descripción del producto"></textarea>
        <span class="text-sm text-red-500">
            @if ($errors->has('description'))
                {{ $errors->first('description') }}
            @endif
        </span>

    </div>
    <div class="px-2 flex-wrap">
        {{-- extracto null  --}}
        <label for="extracto" class="text-xs">Extracto (150 caracteres)</label>
        <textarea wire:model="extracto" class="w-full rounded mb-2 {{ $errors->has('extracto') ? 'border-red-500' : ' ' }}"
            cols="30" rows="3" placeholder="Extracto"></textarea>
        <span class="text-sm text-red-500">
            @if ($errors->has('extracto'))
                {{ $errors->first('extracto') }}
            @endif
        </span>
    </div>

</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="form__div mx-2">
        {{-- keywords null --}}
        <input wire:model="keywords" class="form__input" placeholder=" "
            style="{{ $errors->has('keywords') ? 'border: 1px solid red' : '' }}" />
        <label for="" class="form__label">
            @if ($errors->has('keywords'))
                {{ $errors->first('keywords') }}
            @else
                Keywords Ej: tornillo, tuerca
            @endif
        </label>
    </div>

    <div class="form__div mx-2">
        {{-- keywords null --}}
        <input wire:model="referencia" class="form__input"placeholder=" " style="{{ $errors->has('referencia') ? 'border: 1px solid red' : '' }}"/>
        <label for="" class="form__label">
            @if ($errors->has('referencia'))
                {{ $errors->first('referencia') }}
            @else
                Referencia: AK-011*
            @endif

        </label>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div>
        {{-- price --}}
        <div class="form__div mx-2">
            <input wire:model="price" type="text" class="form__input" placeholder=" "
                style="{{ $errors->has('price') ? 'border: 1px solid red' : '' }}">
            <label for="" class="form__label">
                @if ($errors->has('price'))
                    {{ $errors->first('price') }}
                @else
                    Precio*
                @endif
            </label>
        </div>

    </div>
    <div>
        {{-- quantity null --}}
        <div class="form__div mx-2">
            <input wire:model="quantity" type="text" class="form__input" placeholder=" "
                style="{{ $errors->has('quantity') ? 'border: 1px solid red' : '' }}">
            <label for="" class="form__label">
                @if ($errors->has('quantity'))
                    {{ $errors->first('quantity') }}
                @else
                    Cantidad
                @endif
            </label>
        </div>
    </div>
    <div class="px-2">
        <select wire:model="category_id" class="form-select w-full px-4 py-3 rounded" style="{{ $errors->has('category_id') ? 'border: 1px solid red' : '' }}">
            <!-- ... -->
            <option value=" ">Selecione una categoría *</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>

        @if ($errors->has('category_id'))
           <small class="text-red-500">{{ $errors->first('category_id') }}</small> 
        @endif
    </div>



</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
    {{-- cabeza null perno --}}
    <div class="form__div mx-2">
        <input wire:model="cabeza" type="text" class="form__input" placeholder=" "
            style="{{ $errors->has('cabeza') ? 'border: 1px solid red' : '' }}">
        <label for="" class="form__label">
            @if ($errors->has('cabeza'))
                {{ $errors->first('cabeza') }}
            @else
                Cabeza: Hex 19mm, Medialuna, redonda
            @endif
        </label>
    </div>

    {{-- estria null perno --}}
    <div class="form__div mx-2">
        <input wire:model="estria" type="text" class="form__input" placeholder=" "
            style="{{ $errors->has('estria') ? 'border: 1px solid red' : '' }}">
        <label for="" class="form__label">
            @if ($errors->has('estria'))
                {{ $errors->first('estria') }}
            @else
                Estria: Plana, Cónica, 1.5mm
            @endif
        </label>
    </div>
    {{-- largo null para pernos --}}
    <div class="form__div mx-2">
        <input wire:model="largo" type="text" class="form__input" placeholder=" "
            style="{{ $errors->has('largo') ? 'border: 1px solid red' : '' }}">
        <label for="" class="form__label">
            @if ($errors->has('largo'))
                {{ $errors->first('largo') }}
            @else
                Largo: (Pernos, mm)
            @endif
        </label>
    </div>
    {{-- rosca null perno y tuerca --}}
    <div class="form__div mx-2">
        <input wire:model="rosca" type="text" class="form__input" placeholder=" "
            style="{{ $errors->has('rosca') ? 'border: 1px solid red' : '' }}">
        <label for="" class="form__label">
            @if ($errors->has('rosca'))
                {{ $errors->first('rosca') }}
            @else
                Rosca: Perno o tuerca
            @endif
        </label>
    </div>
    {{-- hex null para tuerca --}}
    <div class="form__div mx-2">
        <input wire:model="hex" type="text" class="form__input" placeholder=" "
            style="{{ $errors->has('hex') ? 'border: 1px solid red' : '' }}">
        <label for="" class="form__label">
            @if ($errors->has('hex'))
                {{ $errors->first('hex') }}
            @else
                Hexágono: Tuerca
            @endif
        </label>
    </div>

    <div class="form__div mx-2">
        <input wire:model="alto" type="text" class="form__input" placeholder=" "
            style="{{ $errors->has('alto') ? 'border: 1px solid red' : '' }}">
        <label for="" class="form__label">
            @if ($errors->has('alto'))
                {{ $errors->first('alto') }}
            @else
                Alto: Tuerca
            @endif
        </label>
    </div>
</div>
<div class="flex">
    <div wire:loading wire:target="save" class="mr-4 font-black ml-auto">
        Creando el producto.
    </div>


</div>