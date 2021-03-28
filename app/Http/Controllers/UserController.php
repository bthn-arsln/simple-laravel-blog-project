<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Config;
use App\Models\Contact;

class UserController extends Controller
{
    public function __construct()
    {
        view()->share('config', Config::find(1));
        view()->share('messages', Contact::all());
    }
    public function index()
    {
        $users = new User();
        if (request()->get('lastname')) {
            $users = $users->where('lastname', 'LIKE', '%' . request()->get('lastname') . '%');
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
        $user = User::find($id) ?? abort("Kullanıcı bulunamadı");
        return view('admin.user-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->type = $request->type;
        $user->status = $request->status;
        $user->save();
        return redirect()->route('admin.users')->withSuccess('Kullanıcı durumu başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.users')->withSuccess('Bu kullanıcı silindi');
    }
}
