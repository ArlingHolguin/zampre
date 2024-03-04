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
            Image::factory(2)->create([
                'imageable_id' => $product->id,
                'imageable_type' => Product::class
            ]);
        $product->brands()->attach([
            random_int(1, 2),
        ]);
    }

    // Product::factory(100)->create()->each(function(Product $product){
    //     Image::factory(4)->create([
    //         'imageable_id' => $product->id,
    //         'imageable_type' => Product::class
    //     ]);
    // });
    
    }
}
