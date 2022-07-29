<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(8),
            'content' => $this->faker->text(2500),
            'user_id' => User::inRandomOrder()->first(),
            'created_at' => $this->faker->dateTimeBetween('-2 months'),
        ];
    }
}
