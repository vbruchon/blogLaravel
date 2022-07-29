<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $random = rand(0, 1);

        if ($random < 0.5) {
            return [
                'user_id' => User::inRandomOrder()->first(),
                'post_id' => Post::inRandomOrder()->first(),
                'content' => $this->faker->text(),
                'created_at' => $this->faker->dateTimeBetween('-2 months'),
            ];
        } else {
            return [
                'email' => $this->faker->email(),
                'pseudo' => $this->faker->name(),
                'post_id' => Post::inRandomOrder()->first(),
                'content' => $this->faker->text(),
                'created_at' => $this->faker->dateTimeBetween('-2 months'),
            ];
        }
    }
}
