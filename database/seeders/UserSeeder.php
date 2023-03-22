<?php

namespace Database\Seeders;

use App\Models\Regione;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jose Azabache Santos',
            'email' => 'admin@gmail.com',
            'password' => '123',
            'calle' => 'Los Laureles',
            'distrito' => 'San Juan de Miraflores',
            'numero' => '1234',
            'regione_id' => Regione::all()->random()->id,
        ])->assignRole('Admin');

        User::factory(4)->create();
    }
}