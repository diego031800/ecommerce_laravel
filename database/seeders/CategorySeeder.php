<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'VERDURAS',
            'estado' => '1'
        ]);

        Category::create([
            'name' => 'FRUTAS',
            'estado' => '1'
        ]);

        Category::create([
            'name' => 'CARNES',
            'estado' => '1'
        ]);

        Category::create([
            'name' => 'FRUTOS SECOS',
            'estado' => '1'
        ]);

        Category::create([
            'name' => 'ABARROTES',
            'estado' => '1'
        ]);
    }
}
