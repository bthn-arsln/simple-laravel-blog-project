<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::with('author')->simplePaginate(5);
        return view('index', compact('posts'));
    }
    public function post($id)
    {
        $post = Post::with('author')->find($id);
        return view('post', compact('post'));
    }
}
