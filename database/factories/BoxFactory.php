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
            
            // Génère un nom de locataire aléatoire
            'nom_locataire' => fake()->name(),
            
            // Génère un numéro de box aléatoire, ici entre 1 et 100
            'numero_box' => 'Box ' . fake()->numberBetween(1, 100),
        ];
    }
}
