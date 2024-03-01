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

    public function limpiar(){
        $this->reset([
            
            'marca'
        ]);
            
    }
    public function render()
    {
          // $products = $this->category->products()
        //                     ->where('status', 2)
        //                     ->paginate(12);
        $productsQuery = Product::query()->whereHas('category', function(Builder $query){
            $query->where('id', $this->category->id);
        });
        // if($this->categoria){
        //     $productsQuery  = $productsQuery->whereHas('category', function(Builder $query){
        //         $query->where('name', $this->categoria);
        //     });
        // }

        if($this->marca){
            $productsQuery  = $productsQuery->whereHas('brands', function(Builder $query){
                $query->where('name', $this->marca);
            });
        }
        $products = $productsQuery->paginate(28);
        return view('livewire.category-filter', compact('products'));
    }
}
