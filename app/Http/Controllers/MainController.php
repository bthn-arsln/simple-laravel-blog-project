<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Config;
use App\Models\Social;
use App\Models\About;
use App\Models\Menu;
use App\Models\Contact;

class MainController extends Controller
{
    public function __construct()
    {
        if (Config::find(1)->status == 'passive') {
            return abort(404, 'Site Bakımda');
        }
        view()->share('config', Config::find(1));
        view()->share('socials', Social::all());
        view()->share('menus', Menu::all());
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

    public function contactPost(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();

        return redirect()->route('home')->withSuccess('Mesajınız başarıyla iletilmiştir');
    }

    public function post($slug)
    {
        $post = Post::with('author')->whereSlug($slug)->first() ?? abort(404, "Makale bulunamadı");
        return view('post', compact('post'));
    }

    public function pages($url)
    {
        $menu = Menu::where('url', $url)->first();
        return view('pages', compact('menu'));
    }
}
