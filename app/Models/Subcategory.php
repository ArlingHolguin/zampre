<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relacion uno a muchos con productos
    public function products(){
        return $this->hasMany(Product::class);
    }

    //relacion uno a muchos inverda con category
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
