<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;


class CategoryFilter extends Component
{
    
    use WithPagination;
    public $category,  $marca, $subcategoria;
    public $view = "grid";  
    public $precio_asc;
    public $precio_desc;
    public $sortPrice = null;
    public $freeShipping = null;

    protected $queryString = [
        'marca' => ['except' => ''],
        'subcategoria' => ['except' => ''],
        'sortPrice' => ['except' => null],
        'freeShipping' => ['except' => null],
    ];

  
    public function limpiar(){
        $this->reset(['marca', 'subcategoria', 'sortPrice', 'freeShipping', 'page']);
        $this->resetPage();
        
    }

    public function sortByPrice($sortDirection)
    {
        if ($this->sortPrice !== $sortDirection) {
            $this->resetPage();
            $this->sortPrice = $sortDirection;
        }
    }

    public function updatingMarca()
    {
        $this->resetPage();
    }

    public function updatingSubcategoria()
    {
        $this->resetPage();
    }

   
    public function render()
    {
       
        //creacion de la copnsulta para filtrar los productos
        $productsQuery = Product::query()->where('status', '1')
                    ->whereHas('subcategory.category', function(Builder $query){
            $query->where('id', $this->category->id);
        });

        if($this->subcategoria){
            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query){
                $query->where('name', $this->subcategoria);
            });
        }

        if($this->marca){
            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query){
                $query->where('name', $this->marca);
            });
        }

         // Ordenar por precio
        // if ($this->sortPrice === 'precio_asc') {
        //     $productsQuery = $productsQuery->when(
        //         function ($query) {
        //             return $query->whereNotNull('price_discount')->where('price_discount', '>', 0);
        //         },
        //         function ($query) {
        //             return $query->orderBy('price_discount', 'asc');
        //         },
        //         function ($query) {
        //             return $query->orderBy('price', 'asc');
        //         }
        //     );
        // } elseif ($this->sortPrice === 'precio_desc') {
        //     $productsQuery = $productsQuery->when(
        //         function ($query) {
        //             return $query->whereNotNull('price_discount')->where('price_discount', '>', 0);
        //         },
        //         function ($query) {
        //             return $query->orderBy('price_discount', 'desc');
        //         },
        //         function ($query) {
        //             return $query->orderBy('price', 'desc');
        //         }
        //     );
        // }

        if ($this->sortPrice === 'precio_asc') {
            $productsQuery->orderByRaw('IF(price_discount > 0, price_discount, price) ASC');
        } elseif ($this->sortPrice === 'precio_desc') {
            $productsQuery->orderByRaw('IF(price_discount > 0, price_discount, price) DESC');
        }

        if (!is_null($this->freeShipping)) {
            $productsQuery = $productsQuery->where('free_shipping', $this->freeShipping);
        }

        $productsQuery = $productsQuery->orderBy('created_at', 'desc');

        // Creación de la colección de productos
        $products = $productsQuery->paginate(12);  
        
        
       
        return view('livewire.category-filter', compact('products'));
    }
}
