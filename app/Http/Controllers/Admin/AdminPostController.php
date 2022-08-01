<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    //SHOW ALL POST IN TH DASHBOARD
    public function index()
    {
        $posts = Post::latest()->paginate(20);

        return view('dashboard.dashboard_post', ['posts' => $posts]);
    }

    //CREATE AN NEW POST
    public function create()
    {
        // Redirection
        return view('dashboard.dashboard_create');
    }

    public function addPost(Post $post, Request $request)
    {
        // Validation
        $rules = [
            'title' => ['string', 'min:10', 'max:250'],
            'content' => ['string', 'max:65000'],
            'user_id' => ['exists:App\Models\User,id'],
        ];

        $validated = $request->validate($rules);

        // Ajout du Post
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = Auth::id();

        $post->save();

        // Redirection
        return redirect()->back()->with('message', 'L\'article a bien été créer !');
    }

    //SHOW AN ARTICLE FOR THE UPDATE
    public function show(Post $post)
    {
        $post->load(['user']);

        return view('dashboard.dashboard_post_edit', ['post' => $post]);
    }

    //UPDATE,VALIDATE AN ARTICLE AND SAVE IN DB
    public function update(Request $request, Post $post)
    {
        // Validation
        $rules = [
            'title' => ['required', 'string', 'max:250'],
            'content' => ['required', 'string', 'max:65000'],
            'post_id' => ['required', 'exists:App\Models\Post,id'],
        ];

        $validated = $request->validate($rules);
        // Ajout du commentaire
        $post->title = $validated['title'];
        $post->content = $validated['content'];

        $post->save();

        // Redirection
        return redirect()->back()->with('message', 'L\'article a bien été modifié !');
    }

    // DELETE AN POST IN DB VIA DASHBOARD
    public function destroy(Post $post)
    {
        $post->comments()->delete();
        $post->delete();

        return redirect()->back()->with('message', 'L\'article a bien été supprimé !');
    }
}
