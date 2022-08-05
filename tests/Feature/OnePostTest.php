<?php

namespace Tests\Feature;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OnePostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_post_no_exist()
    {
        $response = $this->get('/api/post/5454');

        $response->assertStatus(404);
    }

    public function test_get_post_correctly()
    {
        $post = Post::factory()->forUser()->create();

        $response = $this->get('/api/post/' . $post->id);

        $response->assertStatus(200);
    }

    public function test_if_JsonStructure_is_exactly_as_databaseStructure()
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

    public function test_if_data_of_one_post_in_Json_are_identical_at_data_of_one_post_in_database()
    {
        /*$post = Post::all()
            ->forUser()
            ->create();*/
        $post = [
            $onepost = new Post,
            $onepost->title = "Ceci est un titre",
            $onepost->content = "Ceci est un titre",
            $onepost->user_id = "Ceci est un titre",
            $onepost->created_at = "Ceci est un titre",
            $onepost->updated_at = "Ceci est un titre",
            $onepost
            $onepost -> save()
        ];

        $post->forUser->create();

        $response = $this->get('/api/post/' . $post->id);
        $response->assertStatus(200)//jusqu'ici c'est bon
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
