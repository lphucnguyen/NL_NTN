<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

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

    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'type' => $this->fake->numberBetween($min = 1, $max = 4),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween($min = 1000000, $max = 99000000),
            'quantity' => $this->faker->numberBetween($min = 1, $max = 200),
        ];
    }
}
