<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;



class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products =  Product::factory(100)->create();

        foreach ($products as $product) {
            Image::factory(1)->create([
                'imageable_id' => $product->id,
                'imageable_type' => Product::class
            ]);
            $product->brands()->attach([
                rand(1, 10),
                rand(11, 20),
                rand(21, 40),
                rand(41, 51),
                rand(52, 61)
            ]);
        }
    
    }
}
