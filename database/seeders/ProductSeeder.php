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

            // Calcular descuento
            $discountPercent = random_int(10, 30); // Porcentaje de descuento aleatorio entre 10% y 30%
            $discountAmount = $product->price * ($discountPercent / 100.0); // Monto del descuento

            // Actualizar precio con descuento y porcentaje de descuento
            $product->update([
                'price_discount' => $product->price - $discountAmount,
                'price_discount_percent' => $discountPercent,
            ]);
        }
    
    }
}
