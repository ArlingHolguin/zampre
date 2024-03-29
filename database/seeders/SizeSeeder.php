<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $sizes = ['Talla S', 'Talla M', 'Talla L'];
        $products =  Product::whereHas('subcategory', function(Builder $query){
            $query->where('color', true)
                    ->where('size', true);
        })->get();

        foreach($products as $product){
            foreach ($sizes as $size) {                
               $product->sizes()->create([
                   'name' => $size
               ]); 
                
            }
            
        }
    }
}
