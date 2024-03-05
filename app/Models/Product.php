<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    const BORRADOR = 1;
    const PUBLICADO = 2;


    protected $guarded =[
        'id'
    ];

    

    //relacion uno a muchos inversa con category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // relacion uno a muchos inversa con brand
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    //relacion uno a muchos inversa con subcategory
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    //relacion uno s muchos ocn Sizes
    public function sizes(){
        return $this->hasMany(Size::class);
    }

    //relacion muchos a muchos con color
    public function colors(){
        return $this->belongsToMany(Color::class);
    }

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

    public function getRouteKeyName(){
        return 'slug';
    }



}
