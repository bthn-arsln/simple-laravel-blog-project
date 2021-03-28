<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Config;
use App\Models\Contact;

class PostController extends Controller
{
    public function __construct()
    {
        view()->share('config', Config::find(1));
        view()->share('messages', Contact::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('author');
        if (request()->get('title')) {
            $posts = $posts->where('title', 'LIKE', '%' . request()->get('title') . '%');
        }
        if (request()->get('status')) {
            $posts = $posts->where('status', request()->get('status'));
        }
        $posts = $posts->get();
        return view('admin.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->author_id = $request->author_id;
        $post->description = $request->description;
        $post->slug = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $name = Str::slug($request->title) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/posts'), $name);
            $post->image = 'uploads/posts/' . $name;
        }

        $post->save();
        return redirect()->route('admin.posts.index')->withSuccess('Makale başarıyla oluşturuldu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first() ?? abort(404, 'Makale bulunamadı');
        return view('admin.post-edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->author_id = $request->author_id;
        $post->status = $request->status;
        $post->description = $request->description;
        $post->slug = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $name = Str::slug($request->title) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/posts'), $name);
            $post->image = 'uploads/posts/' . $name;
        }
        $post->save();

        return redirect()->route('admin.posts.index')->withSuccess("Makale başarıyla güncellendi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)->first()->delete();
        return redirect()->route('admin.posts.index')->withSuccess('Makale başarıyla silindi');
    }
}
