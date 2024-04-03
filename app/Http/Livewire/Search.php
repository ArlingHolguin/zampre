<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Search extends Component
{
    public $search;

    public $open = false;

    public function updatedSearch($value){
        if ($value) {
            $this->open = true;
        }else{
            $this->open = false;
        }
    }

    public function render()
    {

        //Tv de 32" Full HD

        if ($this->search) {
            $searchTerm = str_replace(' ', '', $this->search);

            $products = Product::where(function ($query) use ($searchTerm) {
                                $query->whereRaw("REPLACE(name, ' ', '') LIKE ?", ['%' . $searchTerm . '%'])
                                      ->orWhereHas('subcategory.category', function ($subQuery) use ($searchTerm) {
                                          $subQuery->whereRaw("REPLACE(name, ' ', '') LIKE ?", ['%' . $searchTerm . '%']);
                                      });
                            })
                            ->where('status', '1')
                            ->take(12)
                            ->get();
                                
        } else {
            $products = [];
        }
        
        return view('livewire.search', compact('products'));
    }

}
