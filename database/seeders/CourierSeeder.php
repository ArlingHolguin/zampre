<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Courier;
use Illuminate\Support\Facades\File;


class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

         // Leer el archivo JSON
         $jsonPath = database_path('couries.json');
         $json = File::get($jsonPath);
         $couriers = json_decode($json, true)['data'];
 
         foreach ($couriers as $courier) {
            Courier::create(
                $courier
            );
        }
    }
}
