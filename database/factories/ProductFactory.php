<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
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
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'referencia' =>Str::upper($referencia) ,
            'price' => $this->faker->randomElement([85000, 12000, 34000, 25000, 50000, 10000, 18000, 23000, 30000, 43000, 40000, 150000, 90000 ]),
            'quantity' => $quantity,
            'status' => $this->faker->randomElement([Product::BORRADOR, Product::PUBLICADO]),
            'keywords' => json_encode([$this->faker->word(), $this->faker->word()]),
            'extracto' => $name.','. $this->faker->text(15),
            // 'category_id' => $cat->id,
            'subcategory_id' => $subcategory->id,
            'brand_id' => $brand->id,
            'free_shipping' => $this->faker->randomElement([0, 1]),
            'dimensions' => json_encode([
                'width' => 15,
                'height' => 15,
                'length' => 10,
                'weight' => 1
            ]),

            
        ];
    }
}
