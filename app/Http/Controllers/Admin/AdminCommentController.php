<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminCommentController
{
    public function index(Post $post)
    {
        $post->load('comments', 'comments.user');

        return view('dashboard.dashboard_post_comment', ['post' => $post]);
    }

    public function show(Post $post, Comments $comment)
    {
        $comment = $post->comments->find($comment);

        //Redirections
        return view('dashboard.dashboard_post_comment_update', ['comment' => $comment]);
    }

    public function update(Post $post, Comments $comment, Request $request)
    {
        // Validation
        if ($comment->email == null) {
            $rules = [
                'id' => ['required', 'exists:App\Models\Comments,id'],
                'post_id' => ['required', 'exists:App\Models\Post,id'],
                'content' => ['required', 'string', 'max:500'],
            ];
        } else {
            $rules = [
                'id' => ['required', 'exists:App\Models\Comments,id'],
                'post_id' => ['required', 'exists:App\Models\Post,id'],
                'content' => ['required', 'string', 'max:500'],
                'email' => ['required', 'email'],
            ];
        }
        $validated = $request->validate($rules);

        // Ajout du commentaire
        if (isset($validated['email'])) {
            $comment->email = $validated['email'];
            $comment->content = $validated['content'];
            $comment->post_id = $validated['post_id'];
        } else {
            $comment->content = $validated['content'];
            $comment->post_id = $validated['post_id'];
        }
        $comment->save();
        $post->save();
        // Redirection
        return redirect()->back()->with('message', 'Le commentaire a bien été modifié !');
    }

    public function destroy(Post $post, Comments $comment)
    {
        $post->comments->find($comment)->delete();

        return redirect()->back()->with('message', 'Le commentaire a bien été supprimé !');
    }
}
