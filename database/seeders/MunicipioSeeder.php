<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Leer el archivo JSON
        $jsonPath = database_path('all_provincies.json');
        $json = File::get($jsonPath);
        $provinces = json_decode($json, true)['data'];

        // Crear un mapeo de 'state_code' a 'departamento_id'
        $departamentos = Departamento::all()->pluck('id', 'state_code')->toArray();

        // Procesar los datos y crear municipios
        foreach ($provinces as $province) {
            // Verifica si el state_code existe en el arreglo de departamentos
            if (isset($departamentos[$province['state_code']])) {
                // Crear el municipio si el state_code corresponde a un departamento existente
                Municipio::create([
                    'name' => $province['name'],
                    'departamento_id' => $departamentos[$province['state_code']],
                    'state_code' => $province['state_code'],
                    'code' => $province['code'] ?? '',
                ]);
            }
        }
    }
}
