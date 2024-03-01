<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class CardProductsCount extends Component
{
    public $count;
    public $publicados;

    public function mount()
    {
        $this->count = \App\Models\Product::count();
        //consulta para calcular el totatl de los productos publicados
        $this->publicados = \App\Models\Product::where('status', 1)->count();


    }
    public function render()
    {
        return view('livewire.admin.dashboard.card-products-count');
    }
}
