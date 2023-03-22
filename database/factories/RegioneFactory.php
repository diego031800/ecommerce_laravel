<?php

namespace Database\Factories;

use App\Models\Regione;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegioneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Regione::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->state(),
            'estado' => '1',
        ];
    }
}
