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
    public $options = [];

    public function mount($product)
    {
        $this->quantity = $this->product->quantity;
        $this->options['image'] = Storage::url($this->product->images->first()->url);
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

    public function addItem(){
        Cart::add(['id' => $this->product->id,
                    'name' => $this->product->name,
                    'qty' => $this->qty,
                    'price' => $this->product->price_discount ? $this->product->price_discount : $this->product->price,
                    'weight' => 550,
                    'options' => $this->options
        ]);
        $this->quantity = qty_available($this->product->id);
        $this->reset('qty');

        //emitir un evento// vuelve reactivo el cart 
        $this->emitTo('dropdown-cart', 'render');
    }



    public function render()
    {
        return view('livewire.add-cart-items');
    }
}
