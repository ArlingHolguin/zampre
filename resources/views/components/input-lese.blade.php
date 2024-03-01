<div class="form__div">
    <input {{ $attributes->merge(['type' => 'text', 'class'=> 'form__input',  'placeholder' => " "])}} >
    <label for="" class="form__label">{{ $slot }}</label>
</div>