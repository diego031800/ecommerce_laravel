<?php

namespace Database\Seeders;

use App\Models\Addres;
use App\Models\Proveedore;
use App\Models\Regione;
use Illuminate\Database\Seeder;

class ProveedoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedore::create([
            'name' => 'Coca Cola Company',
            'email' => 'cocaprov@cocacola.com',
            'telefono' => '213551',
            'estado' => '1',
            'calle' => 'Los Laureles',
            'distrito' => 'San Isidro',
            'numero' => 1234,
            'regione_id' => Regione::all()->random()->id
        ]);

        Proveedore::factory(6)->create();
    }
}
