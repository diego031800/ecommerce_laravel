<?php

namespace Database\Factories;

use App\Models\Proveedore;
use App\Models\Regione;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proveedore::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->unique->email(),
            'estado' => '1',
            'telefono' => random_int(200000,999999),
            'calle' => $this->faker->streetName(),
            'distrito' => $this->faker->city(),
            'numero' => random_int(100, 9999),
            'regione_id' => Regione::all()->random()->id
        ];
    }
}
