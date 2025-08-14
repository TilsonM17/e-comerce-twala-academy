<?php

namespace Database\Factories;

use App\Models\CategoryProducts;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductsFactory extends Factory
{

    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'category_id' => CategoryProducts::inRandomOrder()->first()->id,
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'type' => $this->faker->randomElement([
                'physical' => 'Físico',
                'digital' => 'Digital',
            ]),

            'color' => $this->faker->hexColor(),
        ];
    }
}
