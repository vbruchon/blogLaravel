<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comments;
use App\Models\Post;

class AdminCommentController
{
    public function show(Post $post)
    {
        $post->load('comments', 'comments.user');

        return view('dashboard.dashboard_post_comment', ['post' => $post]);
    }

    public function update(){
     //
    }

    public function destroy(){
        //
    }
}
/*
    $coments = Comments::
    return view('dashboard.dashboard_post', ['posts' => $posts]);
*/
