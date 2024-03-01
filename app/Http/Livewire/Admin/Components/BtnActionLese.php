<?php

namespace App\Http\Livewire\Admin\Components;

use Livewire\Component;

class BtnActionLese extends Component
{
    public $name = 'Boton Lese';
    public function render()
    {
        return view('livewire.admin.components.btn-action-lese');
    }
}
