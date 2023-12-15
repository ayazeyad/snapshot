<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_en' => $this->faker->name,
            'name_ar' => $this->faker->name,
            'description_en' => $this->faker->sentence,
            'description_ar' => $this->faker->sentence,
        ];
    }
}
