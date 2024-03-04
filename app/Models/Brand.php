<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    const Borrador = 1;
    const Publicado = 2;
    protected $fillable = ['name'];

    //Relacion uno a muchos
    // public function products(){
    //     return $this->hasMany(Product::class);
    // }

    //Relacion muchos a muchos
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    //Relacion muchos a muchos
    public function products(){
        return $this->belongsToMany(Product::class);
    }

     //uno a muchos polimorfica image
     public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }

   
}
