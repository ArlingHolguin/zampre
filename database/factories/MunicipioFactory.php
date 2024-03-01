<?php

namespace Database\Factories;

use App\Models\Municipio;
use Illuminate\Database\Eloquent\Factories\Factory;

class MunicipioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Municipio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            // $codigo = rand(10, 999 ),
            // 'codigo' => $codigo,
            // 'name' => $this->faker->word(),
            // 'cost' => $this->faker->randomElement([7000, 10000, 12000, 14000, 9000, 8000, 5000, 7600])
        ];
    }
}
