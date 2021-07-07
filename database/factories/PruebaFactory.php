<?php

namespace Database\Factories;

use App\Models\Prueba;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PruebaFactory extends Factory
{
    protected $model = Prueba::class;

    public function definition()
    {
        return [
			'id_prueba' => $this->faker->name,
			'id_tipo_prueba' => $this->faker->name,
			'fecha_servicio' => $this->faker->name,
			'fecha_resultado' => $this->faker->name,
			'id_empresa' => $this->faker->name,
			'id_paciente' => $this->faker->name,
			'id_funcionario' => $this->faker->name,
			'nro_servicio' => $this->faker->name,
        ];
    }
}
