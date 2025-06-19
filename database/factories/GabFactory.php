<?php

namespace Database\Factories;

use App\Models\GabsRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GabFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'request_id' => GabsRequest::factory(), // Gera ou associa um GabsRequest existente
            'path' => null, // Simula um caminho binário ou null
            'message' => $this->faker->optional()->sentence(10), // Mensagem opcional com até 10 palavras
            'status' => 'pendente', // Define o status como sempre "pendente"
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
