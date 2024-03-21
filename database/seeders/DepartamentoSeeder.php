<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $departamentos = array(
            array( // row #0
                'id' => 1,
                'name' => 'Amazonas',
                'state_code' => 'AM'
            ),
            array( // row #1
                'id' => 2,
                'name' => 'Antioquia',
                'state_code' => 'AN'
            ),
            array( // row #2
                'id' => 3,
                'name' => 'Arauca',
                'state_code' => 'AR'
            ),
            array( // row #3
                'id' => 4,
                'name' => 'Atlantico',
                'state_code' => 'AT'
            ),
            array( // row #4
                'id' => 5,
                'name' => 'Bolivar',
                'state_code' => 'BL'
            ),
            array( // row #5
                'id' => 6,
                'name' => 'Boyaca',
                'state_code' => 'BY'
            ),
            array( // row #6
                'id' => 7,
                'name' => 'Caldas',
                'state_code' => 'CL'
            ),
            array( // row #7
                'id' => 8,
                'name' => 'Caqueta',
                'state_code' => 'CA'
            ),
            array( // row #8
                'id' => 9,
                'name' => 'Casanare',
                'state_code' => 'CS'
            ),
            array( // row #9
                'id' => 10,
                'name' => 'Cauca',
                'state_code' => 'CU'
            ),
            array( // row #10
                'id' => 11,
                'name' => 'Cesar',
                'state_code' => 'CE'
            ),
            array( // row #11
                'id' => 12,
                'name' => 'Choco',
                'state_code' => 'CH'
            ),
            array( // row #12
                'id' => 13,
                'name' => 'Cordoba',
                'state_code' => 'CO'
            ),
            array( // row #13
                'id' => 14,
                'name' => 'Cundinamarca',
                'state_code' => 'CN'
            ),
            array( // row #14
                'id' => 15,
                'name' => 'Guainia',
                'state_code' => 'GU'
            ),
            array( // row #15
                'id' => 16,
                'name' => 'Guaviare',
                'state_code' => 'GA'
            ),
            array( // row #16
                'id' => 17,
                'name' => 'Huila',
                'state_code' => 'HU'
            ),
            array( // row #17
                'id' => 18,
                'name' => 'La Guajira',
                'state_code' => 'LG'
            ),
            array( // row #18
                'id' => 19,
                'name' => 'Magdalena',
                'state_code' => 'MA'
            ),
            array( // row #19
                'id' => 20,
                'name' => 'Meta',
                'state_code' => 'ME'
            ),
            array( // row #20
                'id' => 21,
                'name' => 'Nariño',
                'state_code' => 'NA'
            ),
            array( // row #21
                'id' => 22,
                'name' => 'Norte de Santander',
                'state_code' => 'NS'
            ),
            array( // row #22
                'id' => 23,
                'name' => 'Putumayo',
                'state_code' => 'PU'
            ),
            array( // row #23
                'id' => 24,
                'name' => 'Quindio',
                'state_code' => 'QU'
            ),
            array( // row #24
                'id' => 25,
                'name' => 'Risaralda',
                'state_code' => 'RI'
            ),
            array( // row #25
                'id' => 26,
                'name' => 'San Andres y Providencia',
                'state_code' => 'SA'
            ),
            array( // row #26
                'id' => 27,
                'name' => 'Santander',
                'state_code' => 'SN'
            ),
            array( // row #27
                'id' => 28,
                'name' => 'Sucre',
                'state_code' => 'SU'
            ),
            array( // row #28
                'id' => 29,
                'name' => 'Tolima',
                'state_code' => 'TO'
            ),
            array( // row #29
                'id' => 30,
                'name' => 'Valle del Cauca',
                'state_code' => 'VC'
            ),
            array( // row #30
                'id' => 31,
                'name' => 'Vaupes',
                'state_code' => 'VA'
            ),
            array( // row #31
                'id' => 32,
                'name' => 'Vichada',
                'state_code' => 'VI'
            ),
        );

        foreach ($departamentos as $departamento) {
            Departamento::create(
                $departamento
            );
        }
    }
}
