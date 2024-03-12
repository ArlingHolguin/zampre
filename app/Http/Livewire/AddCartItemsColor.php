<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItemsColor extends Component
{
    public $product, $colors;
    public $color_id = "";

    public $qty = 1;
    public $quantity = 0;
    
    public $options = [
        'size_id' => null
    ];

    public function mount(){
        $this->colors = $this->product->colors;        
        $this->options['image'] = Storage::url($this->product->images->first()->url);

    }

    public function updatedColorId($value){    
        $color = $this->product->colors->find($value); 
        if ($color) {
            // $this->quantity = qty_available($this->product->id, $color->id);
            $this->quantity = $color->pivot->quantity;
            $this->options['color_id'] = $color->id;
            
        } else {
            $this->quantity = 0;
            $this->options['color_id'] = null;
        }
    }

    // public function updatedColorId($value){
    //     $this->quantity = $this->product->colors->find($value)->pivot->quantity;
    // }
    

    public function increment(){
        $this->qty = $this->qty + 1;
    }

    public function decrement(){
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
        $this->quantity = qty_available($this->product->id, $this->color_id);
        $this->reset('qty');

        //emitir un evento// vuelve reactivo el cart 
        $this->emitTo('dropdown-cart', 'render');
        $this->emitTo('cart-mobile', 'render');
    }

    public function render(){
        return view('livewire.add-cart-items-color');
    }

}
