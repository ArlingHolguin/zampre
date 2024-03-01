<?php

namespace App\Http\Livewire;

use App\Models\Orden;
use Livewire\Component;

class OrderStatusUpdate extends Component
{
    public $orden;

    public function mount(Orden $orden){
        $this->orden = $orden;

    }


    public function render()
    {
               
        return view('livewire.order-status-update');
    }
}
