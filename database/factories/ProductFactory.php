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
            'name' => fake()->text(random_int(5,15)),
            'description' => fake()->text(random_int(20,100)),
            'price' => fake()->numberBetween(20,1000),
            'imageUrl' => fake()->url(),
        ];
    }
}
