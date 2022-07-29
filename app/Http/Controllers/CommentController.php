<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        if (Auth::check()) {
            $rules = [
                'comment' => ['required', 'max:2000'],
                'post_id' => ['required', 'exists:App\Models\Post,id'],
            ];
        } else {
            $rules = [
                'email' => ['required', 'email', 'nullable'],
                'pseudo' => ['required', 'nullable'],
                'comment' => ['required', 'max:2000'],
                'post_id' => ['required', 'exists:App\Models\Post,id'],
            ];
        }

        $validated = $request->validate($rules);

        // Ajout du commentaire
        $comment = new Comments;
        $comment->content = $validated['comment'];
        $comment->post_id = $validated['post_id'];

        if (Auth::check()) {
            $comment->user_id = Auth::id();
        } else {
            $comment->email = $validated['email'];
            $comment->pseudo = $validated['pseudo'];
        }

        $comment->save();

        // Redirection
        return redirect()->route('post.show', $validated['post_id']);
    }
}
