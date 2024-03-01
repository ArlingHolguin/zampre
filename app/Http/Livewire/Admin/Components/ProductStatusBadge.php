<?php

namespace App\Http\Livewire\Admin\Components;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class ProductStatusBadge extends Component
{ 
    
    public Model $model;
    public string $field;

    public bool $isActive;


    public function mount()
    {
        $this->isActive = (bool) $this->model->getAttribute($this->field);
    }

    public function render()
    {
        return view('livewire.admin.components.product-status-badge');
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
    }

   
}
