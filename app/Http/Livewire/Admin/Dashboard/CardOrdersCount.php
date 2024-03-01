<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class CardOrdersCount extends Component
{
    public $count;
    public $entregadoUltimoMes;

    public function mount()
    {
        $this->count = \App\Models\Orden::count();
        $this->entregadoUltimoMes = \App\Models\Orden::where('status', 4)->where('created_at', '>=', now()->subMonth())->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.card-orders-count');
    }
}
