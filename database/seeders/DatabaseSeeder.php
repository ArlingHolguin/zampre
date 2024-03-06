<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    protected $seeder = [
        CategorySeeder::class,
        SubcategorySeeder::class,
        ProductSeeder::class,
    ];


    public function run()
    {
        // \App\Models\User::factory(10)->create();

        
        Storage::deleteDirectory('categories');
        Storage::makeDirectory('categories');
        
        Storage::deleteDirectory('brands');
        Storage::makeDirectory('brands');

        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');
        
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(ColorProductSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ColorSizeSeeder::class);
        
        $this->call(DepartamentoSeeder::class);
        $this->call(MunicipioSeeder::class);
    }
}
