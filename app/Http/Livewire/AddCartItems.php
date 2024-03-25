<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItems extends Component
{
    public $product;
    public $quantity;
    public $qty = 1;
    public $options = [
        'size_id' => null,
        'color_id' => null,
        'dimensions' => null
    ];

    public function mount(){
        
        $this->quantity = qty_available($this->product->id);
        $this->options['image'] = Storage::url($this->product->images->first()->url);
        //dimensions es un campo json en la base de datos
        $this->options['dimensions'] = json_decode($this->product->dimensions, true);
        //prodcuto con envio gratis
        $this->options['free_shipping'] = $this->product->free_shipping;
    }

    public function increment(){
        $this->qty = $this->qty + 1;
    }

    public function decrement(){
        if ($this->qty > 1) {
            $this->qty = $this->qty - 1;
        }
    }

    public function addItem(){
        // dd($this->product);
        $dimensions = json_decode($this->product->dimensions, true);

        if ($dimensions && isset($dimensions['weight'])) {
            $weight = $dimensions['weight'];
        } else {
            // Establece un valor predeterminado para weight si no está disponible
            $weight = 0;
        }

        Cart::add(['id' => $this->product->id,
                    'name' => $this->product->name,
                    'qty' => $this->qty,
                    'price' => $this->product->price_discount ? $this->product->price_discount : $this->product->price,
                    'weight' => $weight,
                    'options' => $this->options
        ]);
        $this->quantity = qty_available($this->product->id);
        $this->reset('qty');

        //emitir un evento// vuelve reactivo el cart 
        $this->emitTo('dropdown-cart', 'render');
        $this->emitTo('cart-mobile', 'render');
    }



    public function render(){
        return view('livewire.add-cart-items');
    }
}
