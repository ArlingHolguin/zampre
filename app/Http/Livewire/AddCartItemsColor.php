<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCartItemsColor extends Component
{
    public $product, $colors;
    public $color_id = '';
    public $qty = 1;
    public $quantity = 0;

    public function mount()
    {
        $this->colors = $this->product->colors;
    }

    public function render()
    {
        return view('livewire.add-cart-items-color');
    }

    public function updatedColorId($value){
    
        $color = $this->product->colors->find($value);

        if ($color) {
            $this->quantity = $color->pivot->quantity;
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

}
