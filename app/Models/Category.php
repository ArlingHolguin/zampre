<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded =[
            'id'
    ];

    //relacion uno a muchos con subcategorias
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    //relacion uno a muchos con productos
    public function products(){
        return $this->hasMany(Product::class);
    }

    //relacion uno a muchos a travez de subcateories con productos 
    public function productsRelacionados(){
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }

    //relacion muchos a muchos con brands
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

     //uno a muchos polimorfica image
     public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }


    //URL AMIGABLES
    public function getRouteKeyName(){
        return 'slug';
    }
}
