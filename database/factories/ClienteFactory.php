<?php

namespace Database\Factories;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clientes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->firstName();
        $email = $this->faker->email();
        return [
            'cli_nit' => Str::random(10),
            'cli_nombre' => $name,
            'cli_telefono' =>55495484+$this->faker->randomFloat(0,0,1000),
            'cli_email' => $email,
            'cli_imagen' => 'https://definicionde.es/wp-content/uploads/2019/04/definicion-de-persona-min.jpg',
        ];
    }
}
