<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryProducts>
 */
class CategoryProductsFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->randomElement([
            'Electronics',
            'Books',
            'Clothing',
            'Home & Kitchen',
            'Sports & Outdoors',
            'Health & Beauty',
            'Toys & Games',
            'Automotive',
            'Grocery & Gourmet Food',
            'Pet Supplies'
        ]);

        return [
            'name' => $name,
            'slug' => str()->slug($name),
            'description' => $this->faker->sentence(),
        ];
    }
}
