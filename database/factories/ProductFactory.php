<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\ProductType;

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
            'type' => ProductType::all()->random()->id,
            'description' => $this->faker->sentence(500),
            'price' => $this->faker->numberBetween(1000000,50000000),
            'quantity' => $this->faker->numberBetween(1,500),
        ];
    }
}
