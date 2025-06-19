<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment_id' => \App\Models\Comment::factory(), // Supondo que 'comment_id' refere-se à tabela 'comments'
            'answer' => $this->faker->paragraph(), // Gera uma resposta aleatória
            'created_at' => now(),
            'updated_at' => now(),
        ];

    }
}
