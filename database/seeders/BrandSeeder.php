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
            ['name' => 'AUDI'],
            ['name' => 'BAIC'],
            ['name' => 'BMW'],
            ['name' => 'BRILLIANCE'],
            ['name' => 'BYD'],
            ['name' => 'CHANGAN'],
            ['name' => 'CHANGHE'],
            ['name' => 'CHERY'],
            ['name' => 'CHEVROLET'],
            ['name' => 'CHRYSLER'],
            ['name' => 'CITROËN'],
            ['name' => 'DAIHATSU'],
            ['name' => 'DFSK'],
            ['name' => 'DODGE'],
            ['name' => 'DONGFENG'],
            ['name' => 'DS AUTOMOBILES'],
            ['name' => 'FAW'],
            ['name' => 'FERRARI'],
            ['name' => 'FIAT'],
            ['name' => 'FORD'],
            ['name' => 'FOTON'],
            ['name' => 'GAC GONOW'],
            ['name' => 'GREAT WALL'],
            ['name' => 'HAVAL'],
            ['name' => 'HIGER'],
            ['name' => 'HONDA'],
            ['name' => 'HYUNDAI'],
            ['name' => 'ISUZU'],
            ['name' => 'IVECO'],
            ['name' => 'JAC'],
            ['name' => 'JAGUAR'],
            ['name' => 'JEEP'],
            ['name' => 'JINBEI'],
            ['name' => 'JMC'],
            ['name' => 'JOYLONG'],
            ['name' => 'KIA'],
            ['name' => 'KENBO'],
            ['name' => 'LAND ROVER'],
            ['name' => 'LEXUS'],
            ['name' => 'LIFAN'],
            ['name' => 'MAHINDRA'],
            ['name' => 'MASERATI'],
            ['name' => 'MAZDA'],
            ['name' => 'MERCEDES BENZ'],
            ['name' => 'MG'],
            ['name' => 'MINI'],
            ['name' => 'MITSUBISHI MOTORS'],
            ['name' => 'NISSAN'],
            ['name' => 'PEUGEOT'],
            ['name' => 'PIAGGIO'],
            ['name' => 'PORSCHE'],
            ['name' => 'RENAULT'],
            ['name' => 'SEAT'],
            ['name' => 'SHINERAY'],
            ['name' => 'SKODA'],
            ['name' => 'SSANGYONG'],
            ['name' => 'SUBARU'],
            ['name' => 'SUZUKI'],
            ['name' => 'TOYOTA'],
            ['name' => 'VOLKSWAGEN'],
            ['name' => 'VOLVO']
            
        ];

        foreach ($brands as $brand) {
            Brand::factory(1)->create($brand);
        }
    }
}
