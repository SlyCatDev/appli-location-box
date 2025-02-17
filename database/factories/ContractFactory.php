<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_start' => $this->faker->date(),
            'date_end' => $this->faker->date(),
            'monthly_price' => $this->faker->randomFloat(2, 0, 9999),
            'box_id' => \App\Models\Box::factory(),
            'tenant_id' => \App\Models\Tenant::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
