<?php

namespace Database\Factories;

use App\Models\buy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<buy>
 */
class BuyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->word,
            'image' => $this->faker->imageUrl(200, 200),
            'note' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(),
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'status'=>'pending',
        ];
    }
}
