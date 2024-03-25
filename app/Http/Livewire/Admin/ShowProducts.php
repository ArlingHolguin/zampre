<?php

namespace App\Http\Livewire\Admin;

use App\Models\Orden;
use App\Models\Product;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducts extends Component
{

    use WithPagination;
    // public $products;  
    public $search;
    public $prueba;

    public $perPage = 10; 

    public $selectAll = false;
    public $selectedProducts = [];
    public $discountPercent;
    public $freeShipping;
    public $increasePercent;

    protected $rulesIncreasePercent = [
        'increasePercent' => 'required|numeric|min:0'
    ];

    //validacion de los campos  freeShipping y discountPercent
    protected $rulesFreeShipping = [
        'freeShipping' => 'required|boolean'
    ];

    protected $rulesDiscountPercent = [
        'discountPercent' => 'required|numeric|min:0'
    ];

    //     protected $listeners =[
    //         'refresh'
    // ];

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('referencia', 'like', '%' . $this->search . '%')
            ->orWhere('price', 'like', '%' . $this->search . '%')
            ->orderBy('products.id', 'desc')
            ->paginate($this->perPage);

        if ($this->selectAll) {
            $this->selectedProducts = $products->pluck('id')->toArray();
        }

        return view('livewire.admin.show-products', compact('products'))->layout('layouts.admin');
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            // Seleccionar todos los productos
            $this->selectedProducts = Product::pluck('id')->toArray();
        } else {
            // Deseleccionar todos los productos
            $this->selectedProducts = [];
        }
    }

    // public function refresh(){
    //     $this->product = $this->product->fresh();
    // }

    //funcion para eliminar un producto y las imagenes relacionadas 
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    public function updateDiscount()
    {

        $rules = $this->rulesDiscountPercent;
        $this->validate($rules);

        $selectedProducts = Product::whereIn('id', $this->selectedProducts)->get();

        foreach ($selectedProducts as $product) {
            // Calcula el nuevo precio con descuento
            $discountAmount = $product->price * ($this->discountPercent / 100);
            $newDiscountedPrice = $product->price - $discountAmount;

            // Actualiza el producto con el nuevo porcentaje de descuento y el precio con descuento
            $product->update([
                'price_discount_percent' => $this->discountPercent,
                'price_discount' => $newDiscountedPrice
            ]);
        }

        // Opcional: resetear las propiedades o enviar un mensaje de éxito
        $this->discountPercent = null;
        $this->selectedProducts = [];
        $this->selectAll = false;


        // session()->flash('message', 'Descuento actualizado correctamente');
    }

    public function updatePrice()
    {
        $rules = $this->rulesIncreasePercent;
        $this->validate($rules);

        $selectedProducts = Product::whereIn('id', $this->selectedProducts)->get();

        foreach ($selectedProducts as $product) {
            // Calcula el nuevo precio incrementado
            $increaseAmount = $product->price * ($this->increasePercent / 100);
            $newPrice = $product->price + $increaseAmount;

            // Actualiza el producto con el nuevo precio
            $product->update(['price' => $newPrice]);
        }

        // Opcional: resetear las propiedades o enviar un mensaje de éxito
        $this->increasePercent = null;
        $this->selectedProducts = [];
        $this->selectAll = false;
    }



    public function updateFreeShipping()
    {
        $rules = $this->rulesFreeShipping;
        $this->validate($rules);

        Product::whereIn('id', $this->selectedProducts)
            ->update(['free_shipping' => $this->freeShipping]);
    }
}
