<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;


class CategoryFilter extends Component
{
    
    use WithPagination;
    public $category,  $marca, $categoria;
    public $view = "grid";

    

  
    public function render()
    {
          $products = $this->category->productsRelacionados()
                            ->where('status', 2)
                            ->paginate(12);
        
       
        return view('livewire.category-filter', compact('products'));
    }
}
