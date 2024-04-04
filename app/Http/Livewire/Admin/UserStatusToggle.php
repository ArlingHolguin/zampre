<?php

namespace App\Http\Livewire\Admin;

use App\Models\Profile;
use App\Models\User;
use Livewire\Component;

class UserStatusToggle extends Component
{

    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function toggleStatus()
{
    $newStatus = $this->user->profile->status == 'Activo' ? 'Inactivo' : 'Activo';
    
    $this->user->profile->update(['status' => $newStatus]);
}

    public function render()
    {
        return view('livewire.admin.user-status-toggle');
    }
}
