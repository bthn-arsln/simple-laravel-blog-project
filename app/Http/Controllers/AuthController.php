<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Config;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        view()->share('config', Config::find(1));
    }
    public function login()
    {
        return view('admin.login');
    }
    public function loginPost(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.index')->withSuccess("Başarıyla giriş yapıldı");
        }
        return redirect()->route('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register()
    {
        return view('admin.register');
    }
    public function registerPost(Request $request)
    {
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->save();
        return redirect()->route('login')->withSuccess('Kaydınız alınmıştır. Sisteme giriş yapabilmeniz için hesabınızın onaylanması gerek.');
    }
}
