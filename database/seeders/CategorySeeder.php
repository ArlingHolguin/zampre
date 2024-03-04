<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Ropa',
                'slug' => Str::slug('ropa'),
                'keywords' => 'ropa hombre mujer, ropa deportiva, ropa casual, ropa formal',
                'extracto' => 'Ropa nacionala e importada para hombre y mujer, ropa deportiva, ropa casual, ropa formal, ropa de marca.',
                'icon' => '<i class="fa-solid fa-shirt"></i>',
            ],
            
            [
                'name' => 'Tecnologia',
                'slug' => Str::slug('tecnologia'),
                'keywords' => 'tecnologia, celulares, computadoras, tablets, televisores',
                'extracto' => 'Tecnologia nacionala e importada, celulares, computadoras, tablets, televisores, tecnologia de marca.',
                'icon' => '<i class="fa-solid fa-laptop"></i>',
            ],
            
           

        ];

        foreach ($categories as $category) {
           $category = Category::factory(1)->create($category)->first();
           $brands = Brand::factory(4)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }
    }
}
