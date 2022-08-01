<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(20);

        return view('dashboard.dashboard_post', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        $post->load(['user']);

        return view('dashboard.dashboard_post_edit', ['post' => $post]);
    }

    public function create()
    {
    }

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

    public function destroy(Post $post)
    {
        $post->comments()->delete();
        $post->delete();

        return redirect()->back()->with('message', 'L\'article a bien été supprimé !');
    }
}
/*public function destroy(Post $post)
{
    $post->comments()->delete();
    $post->delete();

    return redirect()->back()->with('message', 'Article a bien été supprimé !');
}*/
