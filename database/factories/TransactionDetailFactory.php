<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionDetail>
 */
class TransactionDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id' => fake()->numberBetween(1, 10),
            'product_id'     => fake()->numberBetween(1, 10),
            'serial_no'      => fake()->randomNumber(4, true),
            'price'          => fake()->randomNumber(6),
            'discount'       => fake()->randomNumber(4)
        ];
    }
}
