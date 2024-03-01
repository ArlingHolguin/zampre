<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class CardUsersCount extends Component
{
    public $count;
    public $countUltimoMes;

    public function mount()
    {
        $this->count = \App\Models\User::count();
        $this->countUltimoMes = \App\Models\User::where('created_at', '>=', now()->subMonth())->count();
    }
    
    public function render()
    {
        return view('livewire.admin.dashboard.card-users-count');
    }
}
