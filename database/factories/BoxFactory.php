<?php

namespace Database\Factories;

use App\Models\Box;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class BoxFactory extends Factory
{
        // Indique que ce factory est pour le modèle Reservation
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
            // Génère un identifiant unique automatiquement
            'id' => fake()->unique()->randomNumber(),
            
            // Génère un nom de box
            'name' => fake()->name(),

            // Génère une string random
            'contenu' => str()->random(),
        ];
    }
}
