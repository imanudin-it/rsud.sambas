<?php

namespace Database\Factories;

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
        return [
            'title' => $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'body' => $this->faker->paragraph(),
            'foto' => '/assets/img/faker.png',
            'published_at' => now(),
            'user_id' => mt_rand(1,2),
            'category_id' => mt_rand(1,3),
        ];
    }
}
