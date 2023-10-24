<?php

namespace Database\Factories;

use App\Enums\ItemStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->jobTitle(),
            'status' => fake()->randomElement(ItemStatusEnum::getValues()),
            'description' => fake()->text(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => null,
        ]);
    }
}
