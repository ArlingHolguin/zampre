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

    //relacion uno a muchos con productos
    public function products(){

        return $this->hasMany(Product::class);
    }

    //relacion muchos a muchos con brands
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    //URL AMIGABLES
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
