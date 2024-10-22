<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ouvidoria>
 */
class OuvidoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'demanda' => $this->faker->sentence,
            'demandante' => $this->faker->name,
            'setor' => $this->faker->word,
            'unidade' => $this->faker->word,
            'resp_aquisicao' => $this->faker->word,
            'obs' => $this->faker->text,
            'date_dispensacao' => $this->faker->date,
            'date_resposta' => $this->faker->date,
            'user_create_id' => 1, // Pode ser definido depois
        ];
    }
}