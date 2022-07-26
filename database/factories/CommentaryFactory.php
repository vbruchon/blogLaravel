<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentary>
 */
class CommentaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
             $random = mt_rand(0,1);

             if ($random == 0){
                 $userId = User::inRandomOrder()->first();
             } else{
                 $userId = null;
             }

             if ($userId == null) {
                 return [
                     'email' => $this->faker->email(),
                     'pseudo' => $this->faker->name(),
                     'post_id' => Post::inRandomOrder()->first(),
                     'content' => $this->faker->text()
                 ];
             } else {
                 return [
                     'user_id' => $userId,
                     'post_id' => Post::inRandomOrder()->first(),
                     'content' => $this->faker->text()
                 ];
             }
    }
}
