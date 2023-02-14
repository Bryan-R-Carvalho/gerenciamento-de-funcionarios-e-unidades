<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FuncionarioFactory extends Factory
{

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'documento' => $this->faker->unique()->numerify('###########'),
            'email' => $this->faker->unique()->email,
            'idade' => $this->faker->numberBetween(18,90),
            'id_unidade' => $this->faker->numberBetween(1, 10),
            'id_endereco' => $this->faker->numberBetween(1, 10),
        ];
    }
}
