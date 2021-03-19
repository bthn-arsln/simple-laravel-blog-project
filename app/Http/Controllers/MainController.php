<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Config;

class MainController extends Controller
{
    public function __construct()
    {
        view()->share('config', Config::find(1));
    }
    public function index()
    {
        $posts = Post::where('status', 'publish')->with('author')->simplePaginate(5);
        return view('index', compact('posts'));
    }
    public function post($slug)
    {
        $post = Post::with('author')->whereSlug($slug)->first() ?? abort(404, "Makale bulunamadı");
        return view('post', compact('post'));
    }
}
