<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
            'category_id' => $this->faker->numberBetween(1, 5),
            'name_en' => $this->faker->word,
            'name_ar' => fake('ar_JO')->name(),
            'description_en' => $this->faker->sentence,
            'description_ar' => fake('ar_JO')->sentence,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'in_stock' => $this->faker->boolean,
            'for_rent' => $this->faker->boolean,
        ];
    }
}
