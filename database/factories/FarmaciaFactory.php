<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FarmaciaFactory extends Factory
{

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'direccion' => $this->faker->text,
            'latitud' => '-32.88131209245695',
            'longitud' => '-68.85834799171776',
        ];
    }
}
