<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'quantity' => $this->faker->randomNumber(4),
            'code' => $this->faker->postcode(),
            'price' => $this->faker->numberBetween(),
            'images' => $this->faker->imageUrl(),
            'detail' => $this->faker->text(),
            'description' => $this->faker->text(),
            'created_at' => date('Y-m-d', time()),
        ];
    }
}
