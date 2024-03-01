<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // const Borrador = 0;
    // const Publicado = 1;


    protected $guarded =[
        'id'
    ];

    

    //relacion uno a muchos inversa con category
    public function category(){

        return $this->belongsTo(Category::class);
    }

    //relacion uno a muchos inversa con brand
    // public function brand(){
    //     return $this->belongsTo(Brand::class);
    // }

    //relacion uno a muchos inversa con category
    public function brands(){

        return $this->belongsToMany(Brand::class);
    }

    //uno a muchos polimorfica image
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getBuyableIdentifier(){
        return $this->id;
    }



}
