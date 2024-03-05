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
                'color' => false,
                'size' => false,
            ],
            [
                'name' => 'Pantalones',
                'slug' => 'pantalones',
                'category_id' => 1,
                'color' => false,
                'size' => false,
            ],
            //tecnologia 
            [
                'name' => 'Celulares',
                'slug' => 'celulares',
                'category_id' => 2,
                'color' => false,
            ],
            [
                'name' => 'Computadoras',
                'slug' => 'computadoras',
                'category_id' => 2,
                'color' => false,
                'size' => false,
            ],
            [
                'name' => 'Baterias',
                'slug' => 'baterias',
                'category_id' => 2,
                'color' => false,
                'size' => false,

            ],
           

        ];

        foreach ($subcategories  as $subcategory) {
            Subcategory::create($subcategory);
        }
    }
}
