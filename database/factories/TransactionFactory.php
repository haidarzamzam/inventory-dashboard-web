<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'trans_date' => fake()->date(),
            'trans_no'   => fake()->randomNumber(4),
            'customer'   => fake()->name(),
            'trans_type' => fake()->randomElement(['sell', 'buy']),
        ];
    }
}
