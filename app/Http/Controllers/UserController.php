<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class UserController extends Controller
{
    public function index()
    {
        $users = new Admin();
        if (request()->get('name')) {
            $users = $users->where('name', 'LIKE', '%' . request()->get('name') . '%');
        }
        if (request()->get('status')) {
            $users = $users->where('status', request()->get('status'));
        }
        if (request()->get('type')) {
            $users = $users->where('type', request()->get('type'));
        }
        $users = $users->get();
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
