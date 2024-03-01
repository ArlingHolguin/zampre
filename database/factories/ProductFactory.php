<?php

namespace Database\Factories;

use App\Models\Category;
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
        $name = $this->faker->sentence(1);
        $category = Category::all()->random();
        $referencia = 'AK-'.Str::random(10);
        return [
            'name' => $name,
            'slug' => $referencia.'-'. Str::slug($name),
            'description' => $this->faker->text(),
            'referencia' =>Str::upper($referencia) ,
            'price' => $this->faker->randomElement([850, 1200, 3400, 250, 5000, 1000, 1800, 2300, 3000, 4300, 4000, 1500, 900 ]),
            'quantity' => $this->faker->randomElement([200, 1000, 5000, 10000, 500]),
            //medidas
            'cabeza' => $this->faker->randomElement(['Hex 19mm', 'Redonda', 'Media Luna']),
            'rosca' => $this->faker->randomElement(['12x1.25', '12x1.5', '12x1.15']),
            'estria' => $this->faker->randomElement(['14mm', 'Lisa', '12mm']),
            'largo' => $this->faker->randomElement(['2 3/4"', '12mm', '1/2"']),
            'alto' => $this->faker->randomElement(['12mm', '18mm', '2"']),
            'hex' => $this->faker->randomElement(['12mm', '19mm', '14mm']),

            'status' => 1,
            'keywords' => $name,
            'extracto' => $name.','. $this->faker->text(15),
            'category_id' => $category->id,
            
        ];
    }
}
