<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminAboutController extends Controller
{
    public function index() {
        $about = DB::table('about')->first();
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif'
        ]);
        $about = About::findOrFail($id);
        if ($request->hasFile('image')) {
            Storage::delete('public/images/about/'.$about->image);
            $photo = $request->file('image');
            $image_extension = $photo->extension();
            $image_name = $photo->getClientOriginalName();
            $photo->storeAs('/images/about', $image_name, 'public');
            $about->image = $image_name;
        }
        $about->description = $request->description;
        $about->saveOrFail();
        session()->flash('message', 'Data berhasil diupdate');
        return redirect(route('admin.about.index'));
    }
}
