<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => fake()->sentence(3),
            'brand' => fake()->word(),
            'price' => fake()->randomNumber(7),
            'model_no' => fake()->randomNumber(3, true),
        ];
    }
}
