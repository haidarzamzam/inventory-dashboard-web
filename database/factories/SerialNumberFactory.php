<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SerialNumber>
 */
class SerialNumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id'        => fake()->numberBetween(1, 10),
            'serial_no'         => fake()->randomNumber(6, true),
            'price'             => fake()->randomNumber(7),
            'prod_date'         => fake()->date(),
            'warranty_start'    => fake()->date(),
            'warranty_duration' => fake()->randomNumber(),
            'used_table'        => fake()->boolean(),
        ];
    }
}
