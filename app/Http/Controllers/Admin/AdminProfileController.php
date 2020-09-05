<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        if (!empty($search)) {
            $profile = DB::table('profile')->orderByDesc('id')->where('name','LIKE', "%$search%")->orWhere('position', 'LIKE', "%$search%")->paginate(7);
        } else {
            $profile = DB::table('profile')->orderByDesc('id')->paginate(7);
        }
        return view('admin.profile.index', compact('profile'));
    }

    public function create() {
        return view('admin.profile.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'position' => 'required',
            'image' => 'required|image:mimes:jpg,jpeg,png'
        ]);

        $profile = new Profile();
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $image_extension = $photo->extension();
            $image_name = $photo->getClientOriginalName();
            $photo->storeAs('/images/profile', $image_name, 'public');
            $profile->image = $image_name;
        }
        $profile->name = $request->name;
        $profile->position = $request->position;
        $profile->save();
        session()->flash('message', 'Data berhasil ditambah');
        return redirect(route('admin.profile.index'));
    }

    public function delete($id) {
        $profile = Profile::findOrFail($id);
        Storage::delete('public/images/profile/'.$profile->image);
        $profile->delete();
        session()->flash('message', 'Data berhasil dihapus');
        return redirect(route('admin.profile.index'));
    }

    public function edit($id) {
        $profile = Profile::findOrFail($id);
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'position' => 'required',
            'image' => 'nullable|image:mimes:jpg,jpeg,png'
        ]);
        $profile = Profile::findOrFail($id);
        if ($request->hasFile('image')) {
            Storage::delete('public/images/profile/'.$profile->image);
            $photo = $request->file('image');
            $image_extension = $photo->extension();
            $image_name = $photo->getClientOriginalName();
            $photo->storeAs('/images/profile/', $image_name, 'public');
            $profile->image = $image_name;
        }
        $profile->name = $request->name;
        $profile->position = $request->position;
        $profile->saveOrFail();
        session()->flash('message', 'Data berhasil diupdate');
        return redirect(route('admin.profile.index'));
    }
}
