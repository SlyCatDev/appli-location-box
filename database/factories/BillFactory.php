<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'paiement_montant' => $this->faker->randomFloat(2, 1, 99999999),
            'payment_date' => $this->faker->date(),
            'period_number' => $this->faker->randomNumber(2),
            'contract_id' => 1,
        ];
    }
}
