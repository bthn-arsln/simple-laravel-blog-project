<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Config;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function __construct()
    {
        view()->share('config', Config::find(1));
    }
    public function index()
    {
        return view('admin.profile');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;

        if ($request->hasFile('image')) {
            $name = Str::slug($request->firstname . '-' . $request->lastname) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/profile'), $name);
            $user->image = 'uploads/profile/' . $name;
        }

        $user->save();

        return redirect()->route('admin.profile')->withSuccess('Profil bilgileri başaryıla güncellendi');
    }
}
