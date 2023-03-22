<?php

namespace Database\Seeders;

use App\Models\Estadopedido;
use Illuminate\Database\Seeder;

class EstadopedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estadopedido::create([
            'estado' => 'SEPARADO',
        ]);
        Estadopedido::create([
            'estado' => 'PREPARADO',
        ]);
        Estadopedido::create([
            'estado' => 'ENVIADO',
        ]);
        Estadopedido::create([
            'estado' => 'RECEPCIONADO',
        ]);
        Estadopedido::create([
            'estado' => 'ANULADO',
        ]);
    }
}
