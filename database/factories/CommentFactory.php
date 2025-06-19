<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => $this->faker->sentence(),
            'patient_id' => \App\Models\User::factory(), // Supondo que 'patient_id' refere-se a um usuário da tabela 'users'
            'status' => 'aguardando',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
