<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $post = Post::withCount('comments')->latest()->paginate();

        if (count($post) == 0) {
            return response($post, 204);
        }

        return response()->json($post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validation

        $rules = [
            'email' => ['required', 'email', 'nullable'],
            'pseudo' => ['required', 'nullable'],
            'comment' => ['required', 'max:2000'],
            'post_id' => ['required', 'exists:App\Models\Post,id'],
        ];

        $validated = $request->validate($rules);

        // Ajout du commentaire
        $comment = new Comments;
        $comment->content = $validated['comment'];
        $comment->post_id = $validated['post_id'];
        $comment->email = $validated['email'];
        $comment->pseudo = $validated['pseudo'];

        $comment->save();
        // Redirection
        return response()->json($comment, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Post $post)
    {
        $post->load(['comments.user', 'user']);

        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
