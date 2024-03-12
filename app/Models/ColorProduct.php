<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    use HasFactory;

    //agregamos la tabla que queremos que administre este modelo => color_product
    protected $table = 'color_product';

    //relacion con colores es unos a muchos inversa
    public function color(){
        return $this->belongsTo(Color::class);
    }

    //relacion con productos es unos a muchos inversa
    public function product(){
        return $this->belongsTo(Product::class);
    }


}
