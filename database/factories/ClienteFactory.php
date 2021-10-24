<?php

namespace Database\Factories;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $name = $this->faker->name();
        return [
            'cli_nombre' => $name,
            'cli_apellido' =>$name,
            'cli_telefono' =>55495484+$this->faker->randomFloat(0,0,1000),
            'cli_email' => 'prueba@gmail.com',
            'cli_domicilio' => '/image/imagen1.PNG',
        ];
    }
}
