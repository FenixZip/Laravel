<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'sku' => $this->faker->unique()->bothify('SKU-####'),
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(3, 10, 1000),
        ];
    }
}
