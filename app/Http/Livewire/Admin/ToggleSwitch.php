<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class ToggleSwitch extends Component
{

    public Model $model;
    public string $field;

    public bool $status;

    public function mount()
    {

        $this->status = (bool) $this->model->getAttribute($this->field);
    }


    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
    }

    public function render()
    {
        return view('livewire.admin.toggle-switch');
    }
}
