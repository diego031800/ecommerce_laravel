<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Producto;
use App\Models\Proveedore;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->jobTitle();
        return [
            'name' => $name,
            'descripcion' => $this->faker->text(150),
            'stock' =>$this->faker->randomNumber(3),
            'precio' =>$this->faker->numberBetween(5,200),
            'estado' => '1',
            'imagen' => $this->faker->imageUrl(450, 300, 'cats', true, 'Faker'),
            'proveedore_id' => Proveedore::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ];
    }
}
