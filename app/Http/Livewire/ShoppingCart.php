<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;


class ShoppingCart extends Component
{
    protected $listeners = ['render'];
    public $open = true;
    public $showJoggerModal = false;
    public $lastPairsCount = 0; 

    public function mount(){
        $this->updatePrices();
    }
    
    public function updatePrices() {
        $items = Cart::content();
        $joggerCount = $items->where('name', 'Jogger Mujer')->sum('qty');
        $beisboleraCount = $items->whereIn('name', ['Beisbolera larga mujer', 'Beisbolera corta mujer'])->sum('qty');
        
        $pairsCount = min($joggerCount, $beisboleraCount);
        
        // Restablecer precios antes de aplicar descuento para evitar acumulación de descuentos
        $this->resetJoggerPrices();
    
        // Aplicar descuentos según el número de pares
        if ($pairsCount > 0) {
            $this->applyDiscount($pairsCount);
        }
        // Determinar si se debe mostrar el modal de Jogger
    $this->showJoggerModal = ($beisboleraCount > 0 && $joggerCount == 0);
        
        $this->emitTo('dropdown-cart', 'render');
    }
    // public function updatePrices() {
    //     $items = Cart::content();
    //     $joggerCount = $items->where('name', 'Jogger Mujer')->sum('qty');
    //     $beisboleraCount = $items->whereIn('name', ['Beisbolera larga mujer', 'Beisbolera corta mujer'])->sum('qty');
        
    //     $currentPairsCount = min($joggerCount, $beisboleraCount);

    //     // Verifica si el conteo de pares ha cambiado desde la última vez
    //     if ($this->lastPairsCount != $currentPairsCount) {
    //         // Restablecer precios antes de aplicar descuento para evitar acumulación de descuentos
    //         $this->resetJoggerPrices();
        
    //         // Aplicar descuentos según el número de pares
    //         if ($currentPairsCount > 0) {
    //             $this->applyDiscount($currentPairsCount);
    //         }

    //         // Actualiza el último conteo de pares
    //         $this->lastPairsCount = $currentPairsCount;

    //         $this->emitTo('dropdown-cart', 'render');
    //     }
    // }
    private function resetJoggerPrices() {
        Cart::content()->each(function ($item) {
            if ($item->name == "Jogger Mujer") {
                $options = $item->options->toArray();
                $originalPrice = $options['original_price'] ?? $item->price;
                
                // Actualiza el precio al original y elimina el descuento aplicado si existe
                $options['original_price'] = $originalPrice;
                $options['discount'] = 0;
    
                Cart::update($item->rowId, ['price' => $originalPrice, 'options' => $options]);
            }
        });
    }
    
    private function applyDiscount($pairsCount) {
        Cart::content()->each(function ($item) use ($pairsCount) {
            if ($item->name == "Jogger Mujer") {
                $options = $item->options->toArray();
                $originalPrice = $options['original_price'] ?? $item->price;
                $discount = 20000 * $pairsCount;
                $newPrice = $originalPrice - $discount;
                
                if ($newPrice < 0) {
                    $newPrice = 0; // Asegurarse que el precio no sea negativo
                }
    
                // Actualiza el carrito con el nuevo precio y registra el descuento
                $options['original_price'] = $originalPrice;
                $options['discount'] = $discount;
                
                Cart::update($item->rowId, [
                    'price' => $newPrice, 
                    'options' => $options
                ]);
            }
        });
    }
    
    public function destroy(){
        Cart::destroy();

        $this->emitTo('dropdown-cart', 'render');
    }

    public function delete($rowID){
        Cart::remove($rowID);

        $this->updatePrices();
        $this->emitTo('dropdown-cart', 'render');   
    }

    public function render()
    {
        

        return view('livewire.shopping-cart');
    }
}
