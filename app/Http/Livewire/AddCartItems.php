<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCartItems extends Component
{
    public $product;
    public $quantity;
    public $qty = 1;

    public function mount($product)
    {
        $this->quantity = $this->product->quantity;
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




    public function render()
    {
        return view('livewire.add-cart-items');
    }
}
