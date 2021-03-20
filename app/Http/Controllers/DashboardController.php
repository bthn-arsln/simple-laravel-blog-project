<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
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
        return view('admin.configs');
    }

    public function configsUpdate(Request $request)
    {
        $config = Config::find(1);
        $config->title = $request->title;
        $config->footer = $request->footer;
        $config->description = $request->description;

        if ($request->hasFile('logo')) {
            $logo = Str::slug($request->title) . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads'), $logo);
            $config->logo = 'uploads/' . $logo;
        }
        if ($request->hasFile('favicon')) {
            $favicon = Str::slug($request->title) . '.' . $request->favicon->extension();
            $request->favicon->move(public_path('uploads'), $favicon);
            $config->favicon = 'uploads/' . $favicon;
        }
        if ($request->hasFile('banner')) {
            $banner = Str::slug($request->title) . '.' . $request->banner->extension();
            $request->banner->move(public_path('uploads'), $banner);
            $config->banner = 'uploads/' . $banner;
        }

        $config->save();
        return redirect()->route('admin.configs')->withSuccess('Ayarlar başarıyla güncellendi');
    }
}
