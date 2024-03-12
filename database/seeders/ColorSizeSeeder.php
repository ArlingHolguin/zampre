<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class ColorSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sizes = Size::all();

        // a cada talla debe ir al menos unos de cada color 
        foreach ($sizes as $size) {
            $size->colors()->attach(1, ['quantity' => 5]);
            $size->colors()->attach(2, ['quantity' => 5]);
            $size->colors()->attach(3, ['quantity' => 5]);
            $size->colors()->attach(4, ['quantity' => 5]);

            
        }
    }
}
