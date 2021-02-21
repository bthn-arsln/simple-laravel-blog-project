<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.index');
        }
        return redirect()->route('login.index');
    }
}
