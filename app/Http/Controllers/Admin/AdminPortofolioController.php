<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminPortofolioController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        if (!empty($search)) {
            $portofolio = DB::table('portofolio')->orderByDesc('id')->whereTitle('LIKE', "%$search%")->orWhere('description', 'LIKE', "%$search%")->paginate(4);
        } else {
            $portofolio = DB::table('portofolio')->orderByDesc('id')->paginate(4);
        }
        return view('admin.portofolio.index', compact('portofolio'));
    }

    public function create() {
        return view('admin.portofolio.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        $portofolio = new Portofolio();
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $image_extension = $photo->extension();
            $image_name = $photo->getClientOriginalName();
            $photo->storeAs('/images/portfolio', $image_name, 'public');
            $portofolio->image = $image_name;
        }
        $portofolio->title = $request->title;
        $portofolio->description = $request->description;
        $portofolio->save();
        session()->flash('message', 'Data berhasil ditambah');
        return redirect(route('admin.portofolio.index'));
    }

    public function delete($id) {
        $portofolio = Portofolio::findOrFail($id);
        Storage::delete('public/images/portfolio/'.$portofolio->image);
        $portofolio->delete();
        session()->flash('message', 'Data berhasil dihapus');
        return redirect(route('admin.portofolio.index'));
    }

    public function edit(Request $request, $id) {
        $portofolio = Portofolio::findOrFail($id);
        return view('admin.portofolio.edit', compact('portofolio'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);
        $portofolio = Portofolio::findOrFail($id);
        if ($request->hasFile('image')) {
            Storage::delete('public/images/portfolio/'.$portofolio->image);
            $photo = $request->file('image');
            $image_extension = $photo->extension();
            $image_name = $photo->getClientOriginalName();
            $photo->storeAs('/images/portfolio', $image_name, 'public');
            $portofolio->image = $image_name;
        }
        $portofolio->title = $request->title;
        $portofolio->description = $request->description;
        $portofolio->saveOrFail();
        session()->flash('message', 'Data berhasil diupdate');
        return redirect(route('admin.portofolio.index'));
    }
}
