<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Contact;
use Illuminate\Support\Str;

class MenuController extends Controller
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
        $menus = Menu::all();
        return view('admin.menu', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->title = $request->title;
        $menu->url = $request->url;
        $menu->content = $request->content;

        if ($request->hasFile('image')) {
            $fileName = Str::slug($request->title) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/menu'), $fileName);
            $menu->image = 'uploads/menu/' . $fileName;
        }

        $menu->save();
        return redirect()->route('admin.menu')->withSuccess('Menü başarıyla eklendi');
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
    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('admin.menu-edit', compact('menu'));
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
        $menu = Menu::find($id);
        $menu->title = $request->title;
        $menu->url = $request->url;
        $menu->content = $request->content;

        if ($request->hasFile('image')) {
            $fileName = Str::slug($request->title) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/menu'), $fileName);
            $menu->image = 'uploads/menu/' . $fileName;
        }

        $menu->save();

        return redirect()->route('admin.menus.index')->withSuccess('Menü başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::whereId($id)->first()->delete();
        return redirect()->route('admin.menus.index')->withSuccess('Menü başarıyla silindi.');
    }
}
