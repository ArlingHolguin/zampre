<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'image' => 'brands/' .  $this->faker->image('public/storage/brands', 100, 100, null, false),
            'status' => $this->faker->randomElement([1, 2]),
            'name' => $this->faker->unique()->word(),
          

        ];
    }
}
