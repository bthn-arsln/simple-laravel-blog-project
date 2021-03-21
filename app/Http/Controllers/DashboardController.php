<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Social;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function __construct()
    {
        view()->share('config', Config::find(1));
    }

    public function index()
    {
        return view('admin.index');
    }

    public function configs()
    {
        $socials = Social::all();
        return view('admin.configs', compact('socials'));
    }

    public function configsUpdate(Request $request)
    {
        $config = Config::find(1);
        $config->title = $request->title;
        $config->footer = $request->footer;
        $config->description = $request->description;
        $config->status = $request->status;

        if ($request->hasFile('logo')) {
            $logo = Str::slug($request->title) . '-logo.' . $request->logo->extension();
            $request->logo->move(public_path('uploads'), $logo);
            $config->logo = 'uploads/' . $logo;
        }
        if ($request->hasFile('favicon')) {
            $favicon = Str::slug($request->title) . '-favicon.' . $request->favicon->extension();
            $request->favicon->move(public_path('uploads'), $favicon);
            $config->favicon = 'uploads/' . $favicon;
        }
        if ($request->hasFile('banner')) {
            $banner = Str::slug($request->title) . '-banner.' . $request->banner->extension();
            $request->banner->move(public_path('uploads'), $banner);
            $config->banner = 'uploads/' . $banner;
        }

        $config->save();
        return redirect()->route('admin.configs')->withSuccess('Ayarlar başarıyla güncellendi');
    }

    public function socialPost(Request $request)
    {
        $social = new Social();
        $social->title = $request->title;
        $social->slug = Str::slug($request->title);
        $social->url = $request->url;
        $social->save();

        return redirect()->route('admin.configs')->withSuccess('Başarıyla sosyal medya hesabı eklendi.');
    }

    public function socialEdit($id)
    {
        $social = Social::whereId($id)->first();
        return view('admin.configs', compact('social'));
    }

    public function socialUpdate(Request $request, $id)
    {
        $social = Social::whereId($id)->first();
        return view('admin.configs', compact('social'));
    }

    public function socialDestroy($id)
    {
        Social::where('id', $id)->first()->delete();
        return redirect()->route('admin.configs');
    }
}
