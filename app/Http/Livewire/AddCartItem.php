<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItem extends Component
{
    
    public $qty = 10;
    public $product, $quantity;
    public $options = [];
    
    public function mount(){
        
       
        $this->quantity = qty_available($this->product->id);
        if($this->product->images->count()){
            $this->options['image'] = Storage::url($this->product->images->first()->url);
        }else{
            $this->options['image'] = asset('img/img-hero.jpg');
        }
        $this->options['referencia'] = $this->product->referencia;
    }

    public function increment(){
        $this->qty = $this->qty + 10;

    }

    public function decrement(){
        if ($this->qty <= 10) {
            $this->qty;
        } else {
            $this->qty = $this->qty - 10;
        }
        
        
    }

    public function addItem(){
        Cart::add(['id' => $this->product->id,
                    'name' => $this->product->name,
                    'qty' => $this->qty,
                    'price' => $this->product->price,
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
        return view('livewire.add-cart-item');
    }
}
