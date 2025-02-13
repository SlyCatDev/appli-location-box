<?php

namespace Database\Factories;

use App\Models\Box;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Box>
 */
class BoxFactory extends Factory
{
        // Indique que ce factory est pour le modèle Box
        protected $model = Box::class;
    
        /**
         * Définition des valeurs générées par le factory
         */
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'contenu' => str()->random(),
            'user_id' => fake()->unique()->numberBetween(1, 10),
        ];
    }
}
