<?php

namespace Database\Factories;

use App\Models\Estadopedido;
use App\Models\Pedido;
use App\Models\User;
use DateInterval;
use Faker\Provider\DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

class PedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fecha = date_format($this->faker->dateTimeBetween(-5, now()), 'Y-m-d');

        return [
            'fechaCreacion' => $fecha,
            'fechaEnvio' => date_format($this->faker->dateTimeBetween(-5, now()), 'Y-m-d'),
            'fechaEntrega' => date_format($this->faker->dateTimeBetween(-5, now()), 'Y-m-d'),
            'estadopedido_id' => Estadopedido::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
