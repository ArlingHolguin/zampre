<?php

namespace App\Http\Livewire\Admin\Components;

use Livewire\Component;
use App\Models\Product;
use App\Exports\ProductExports;
use Maatwebsite\Excel\Facades\Excel;

class ExportableDataTableComponent extends Component
{
    
    public function render()
    {
        return view('livewire.admin.components.exportable-data-table-component');
    }
    

    public function exportToXls()
    {
       

        return (new ProductExports())->download('productos_lese_' . date('Y-m-d') . '_' . now()->toTimeString() . '.xlsx');
    }

  


}
