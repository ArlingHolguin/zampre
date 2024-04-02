<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    const BORRADOR = '0';
    const PUBLICADO = '1';


    protected $guarded =[
        'id'
    ];

    protected $casts = [
        'dimensions' => 'array',
        'keywords' => 'array',
        // 'price' => 'integer',
        // 'price_discount' => 'integer',
        // 'price_discount_percent' => 'integer',
    ];

    //Accesores Stock
    public function getStockAttribute(){
        
        if($this->subcategory->size){
           return  ColorSize::whereHas('size.product', function(Builder $query){
                $query->where('id', $this->id);
            })->sum('quantity');            

        }elseif($this->subcategory->color){

            return ColorProduct::whereHas('product', function(Builder $query){
                $query->where('id', $this->id);
            })->sum('quantity');

        }else{
            return $this->quantity;

        }

        return 'prueba';
    }    

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
        return $this->belongsToMany(Color::class)->withPivot('quantity', 'id');
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
