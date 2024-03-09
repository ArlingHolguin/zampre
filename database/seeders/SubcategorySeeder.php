<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcategory;


class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $subcategories = [
            [
                'name' => 'Joguers',
                'slug' => 'joguers',
                'category_id' => 1,
                'color' => true,
                'size' => true,
            ],
            [
                'name' => 'Pantalones',
                'slug' => 'pantalones',
                'category_id' => 1,
                'color' => true,
                'size' => true,
            ],
            //tecnologia 
            [
                'name' => 'Celulares',
                'slug' => 'celulares',
                'category_id' => 2,
                'color' => true,
                'size' => true,
            ],
            [
                'name' => 'Computadoras',
                'slug' => 'computadoras',
                'category_id' => 2,
                'color' => true,
                'size' => true,
            ],
            [
                'name' => 'Baterias',
                'slug' => 'baterias',
                'category_id' => 2,
                'color' => true,
                'size' => true,

            ],
           

        ];

        foreach ($subcategories  as $subcategory) {
            Subcategory::create($subcategory);
        }
    }
}
