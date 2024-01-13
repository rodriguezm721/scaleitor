<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cobros>
 */
class CobrosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'estatus_est' => $this->faker->numberBetween(1, 3),
            'ajuste_costos' => $this->faker->firstName(),
            'act_indirectos' =>$this->faker->lastName(),
            'num_contrato_c' =>$this->faker->lastName(),
            'contractual_id' => $this->faker->numberBetween(1, 3),
            ];
    }
}
