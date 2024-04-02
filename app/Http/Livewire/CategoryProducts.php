<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CategoryProducts extends Component
{

    public $category;
    public $products = [];

    public function loadPosts(){

        $this->products = $this->category->productsRelacionados()->where('status', '1')->latest()->get();
        

        $this->emit('glider', $this->category->id);
    }

    public function render()
    {
        $precargas=[
            ['name' => '1'],
            ['name' => '1'],
            ['name' => '1'],
            ['name' => '1'],
            ['name' => '1'],
            ['name' => '1']
        ];
        return view('livewire.category-products', compact('precargas'));
    }
}
