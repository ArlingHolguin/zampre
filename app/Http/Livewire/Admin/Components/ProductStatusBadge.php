<?php

namespace App\Http\Livewire\Admin\Components;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class ProductStatusBadge extends Component
{ 
    
    public Model $model;
    public string $field;

    public bool $status;


    public function mount(){
        $this->status = (bool) $this->model->getAttribute($this->field);
    }

    public function render(){        
        return view('livewire.admin.components.product-status-badge');
    }

    // public function updating($field, $value){
    //     // dd($this->model->getAttribute($this->field));
    //     $this->model->setAttribute($this->field, $value)->save();
    // }

    public function updating($field, $value)
{
    $statusValue = $value ? Product::PUBLICADO : Product::BORRADOR;
    $this->model->setAttribute($this->field, $statusValue)->save();
}

   
}
