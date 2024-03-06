<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relacion uno a muchos inversa  con product
    public function product(){
        return $this->belongsTo(Product::class);
    }

    //relacion muchos a muchos con color 
    public function colors(){
        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }

}
