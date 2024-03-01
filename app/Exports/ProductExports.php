<?php
namespace App\Exports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Product;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExports implements FromCollection, WithHeadings, ShouldAutoSize{
    use Exportable;

    public function collection()
    {
        return Product::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Descripcion',
            'Referencia',
            'Slug',
            'Precio',
            'Cantidad',
            'Cabeza',
            'Rosca',
            'Estria',
            'Largo',
            'Alto',
            'Hexagono',
            'Estado/borrador(0) o publicado(1)',
            'Palabras claves',
            'Metadescripcion',
            'Categoría',
            'Fecha creación',
            'Fecha actualización'

        ];
    }
}