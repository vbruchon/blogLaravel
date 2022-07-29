<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $post->load(['comments.user', 'user']);

        return view('post', ['post' => $post]);
    }
}
