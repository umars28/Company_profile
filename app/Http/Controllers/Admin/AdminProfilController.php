<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfilController extends Controller
{
    public function index() {
        $user = User::first();
        return view('admin.profil.index', compact('user'));
    }

    public function store(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable',
            'konfirmasi_password' => 'nullable|same:password'
        ]);
        $password = $request->password;
        $user = User::findOrFail($id);
        if (!empty($password)) {
            $user->password = Hash::make($password);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->saveOrFail();
        session()->flash('message', 'Success');
        return redirect(route('admin.profil.index'));
    }
}
