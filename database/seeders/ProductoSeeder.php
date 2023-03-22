<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Producto;
use App\Models\Proveedore;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'name' => "Gaseosa",
            'descripcion' => 'Gaseosa Coca Cola de 1.5 L Sin Azúcar',
            'stock' => 150,
            'precio' => 3.50,
            'estado' => '1',
            'imagen' => 'img/productos/gaseosa.jpg',
            'proveedore_id' => Proveedore::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ]);

        Producto::factory(30)->create();
    }
}
