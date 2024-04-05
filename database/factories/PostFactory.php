<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->dateTimeBetween('-1 day' );
        return [
            'category_id' => fake()->randomElement(Category::pluck('id')),
            'title' => fake()->name(),
            'description' => fake()->paragraph(),
            'user_id' => fake()->randomElement(User::pluck('id')),
            'created_at' => $date,
            'updated_at' => $date
        ];
    }
}
