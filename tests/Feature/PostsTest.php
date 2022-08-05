<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_no_posts_in_database()
    {
        $response = $this->get('/api/posts');

        $response->assertStatus(204);
    }

    public function test_if_have_ten_posts_in_database()
    {
        //Créer 10 article pour un utilisateur
        Post::factory()
            ->count(10)
            ->forUser()
            ->create();


        $response = $this->get('/api/posts');

        $response->assertStatus(200)
            ->assertJsonCount(10, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'title',
                        'content',
                        'user_id',
                        'created_at',
                        'comments_count',
                    ],
                ],
            ]);
    }

    public function test_if_data_in_Json_are_identical_at_data_in_database()
    {
        $post = Post::factory()
            ->forUser()
            ->create();

        $response = $this->get('/api/posts');
        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    '0' => [
                        'id' => $post->id,
                        'title' => $post->title,
                        'content' => $post->content,
                        'user_id' => $post->user_id,
                    ],
                ],
            ]);
    }
}
