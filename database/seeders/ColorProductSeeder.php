<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;


class ColorProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $products =  Product::whereHas('subcategory', function(Builder $query){
            $query->where('color', true)
                    ->where('size', false);
        })->get();
        
        foreach($products as $product){
            $product->colors()->attach([
                1 => ['quantity' => 6],
                2 => ['quantity' => 6],
                3 => ['quantity' => 6],
                4 => ['quantity' => 6]
            ]);
        }
    }
}
