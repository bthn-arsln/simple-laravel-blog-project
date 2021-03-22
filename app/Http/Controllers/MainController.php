<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Config;
use App\Models\Social;
use App\Models\About;

class MainController extends Controller
{
    public function __construct()
    {
        if (Config::find(1)->status == 'passive') {
            return abort(404, 'Site Bakımda');
        }
        view()->share('config', Config::find(1));
        view()->share('socials', Social::all());
    }
    public function index()
    {
        $posts = Post::where('status', 'publish')->with('author')->simplePaginate(5);
        return view('index', compact('posts'));
    }

    public function about()
    {
        $about = About::find(1);
        return view('about', compact('about'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function post($slug)
    {
        $post = Post::with('author')->whereSlug($slug)->first() ?? abort(404, "Makale bulunamadı");
        return view('post', compact('post'));
    }
}
