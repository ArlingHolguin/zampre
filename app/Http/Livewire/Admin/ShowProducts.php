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
            ->paginate(25);

        return view('livewire.admin.show-products', compact('products'))->layout('layouts.admin');
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
}
