<?php

namespace Database\Seeders;

use App\Models\Pedido;
use App\Models\PedidoProducto;
use App\Models\Regione;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Regione::factory(24)->create();
        $this->call(RoleSeeder::class);
        $this->call(EstadopedidoSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProveedoreSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(UserSeeder::class);
        Pedido::factory(10)->create();
        PedidoProducto::factory(20)->create();
    }
}
