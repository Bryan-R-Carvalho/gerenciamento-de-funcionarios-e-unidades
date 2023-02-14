<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UnidadeFactory extends Factory
{

    public function definition()
    {
      return[
        'razao_social' => $this->faker->company,
        'nome_fantasia' => $this->faker->name,
        'cnpj' => $this->faker->numerify('##############'),
      ];
    }
}
