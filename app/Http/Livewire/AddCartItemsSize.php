<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItemsSize extends Component
{
    public $product, $sizes;
    public $color_id = "";
    public $qty = 1;
    public $quantity = 0;
    public $size_id = "";

    public $colors = [];
    public $options = [];

    public function mount()
    {
        $this->sizes = $this->product->sizes;
        $this->options['image'] = Storage::url($this->product->images->first()->url);
        $this->options['dimensions'] = json_decode($this->product->dimensions, true);
        //prodcuto con envio gratis
        $this->options['free_shipping'] = $this->product->free_shipping;
        
    }

    public function updatedSizeId($value)
    {
        $size = Size::find($value);
        $this->colors = $size->colors;
        $this->options['size_id'] = $size->id;
    }

    public function updatedColorId($value){    
        $size = Size::find($this->size_id);
        $color = $size->colors->find($value);
        if ($color) {
            $this->quantity = qty_available($this->product->id, $color->id, $size->id);
            $this->options['color_id'] = $color->id;
        } else {
            $this->quantity = 0;
            // O puedes manejar de otra manera cuando el color no se encuentra.
        }
        
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }

    public function decrement()
    {
        if ($this->qty > 1) {
            $this->qty = $this->qty - 1;
        }
    }

    public function addItem()
    {
        $dimensions = json_decode($this->product->dimensions, true);

        if ($dimensions && isset($dimensions['weight'])) {
            $weight = $dimensions['weight'];
        } else {
            // Establece un valor predeterminado para weight si no está disponible
            $weight = 0;
        }
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price_discount ? $this->product->price_discount : $this->product->price,
            'weight' => $weight,
            'options' => $this->options
        ]);

        $this->quantity = qty_available($this->product->id, $this->color_id, $this->size_id);
        $this->reset('qty');

        //emitir un evento// vuelve reactivo el cart 
        $this->emitTo('dropdown-cart', 'render');
        $this->emitTo('cart-mobile', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-items-size');
    }
}
