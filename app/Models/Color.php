<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relacion muchus a muchos con product
    public function products(){
        return $this->belongsToMany(Product::class);
    }

    //relacion muchos a muchos con size
    public function sizes(){
        return $this->belongsToMany(Size::class);
    }
}
