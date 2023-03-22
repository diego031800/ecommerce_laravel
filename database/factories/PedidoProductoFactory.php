<?php

namespace Database\Factories;

use App\Models\Pedido;
use App\Models\PedidoProducto;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PedidoProducto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $producto_id = Producto::all()->random()->id;
        $precio = Producto::where('id', '=', $producto_id)->first();

        return [
            'cantidad' => random_int(1,10),
            'precio' => $precio->precio,
            'producto_id' => $producto_id,
            'pedido_id' => Pedido::all()->random()->id,
        ];
    }
}
