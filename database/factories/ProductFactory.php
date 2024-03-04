<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);
        $subcategory = Subcategory::all()->random();
        // $category = Category::all()->random();
        $category = $subcategory->category;
        $referencia = 'ZO-'.Str::random(6);

        $brand = $category->brands->random();

        if($subcategory->color){
            $quantity = null;

        }else{
            $quantity = 15;
        }

        return [
            'name' => $name,
            'slug' => $referencia.'-'. Str::slug($name),
            'description' => $this->faker->text(),
            'referencia' =>Str::upper($referencia) ,
            'price' => $this->faker->randomElement([850, 1200, 3400, 250, 5000, 1000, 1800, 2300, 3000, 4300, 4000, 1500, 900 ]),
            'quantity' => $quantity,
            'status' => 2,
            'keywords' => $name,
            'extracto' => $name.','. $this->faker->text(15),
            // 'category_id' => $cat->id,
            'subcategory_id' => $subcategory->id,
            'brand_id' => $brand->id,

            
        ];
    }
}
