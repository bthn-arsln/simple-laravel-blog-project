<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class UserController extends Controller
{
    public function index()
    {
        $users = Admin::all();
        return view('admin.users', compact('users'));
    }

    public function edit($id)
    {
        $user = Admin::find($id);
        return view('admin.user-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = Admin::find($id);
        $user->type = $request->type;
        $user->status = $request->status;
        $user->save();
        return redirect()->route('admin.users');
    }

    public function destroy($id)
    {
        Admin::find($id)->delete();
        return redirect()->route('admin.users');
    }
}
