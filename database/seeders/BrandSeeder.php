<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            ['name' => 'Marca 1'],
            ['name' => 'Marca 2'],
            ['name' => 'Marca 3'],
            
        ];

        foreach ($brands as $brand) {
            Brand::factory(1)->create($brand);
        }
    }
}
