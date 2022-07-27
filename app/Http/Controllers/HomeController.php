<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::withCount('comments')->latest()->paginate();

        return view('home', ['posts' => $posts]);
    }
}
