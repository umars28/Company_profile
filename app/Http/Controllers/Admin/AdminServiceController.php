<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminServiceController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        if (!empty($search)) {
            $services = DB::table('services')->orderByDesc('id')->where('title','LIKE', "%$search%")->orWhere('description', 'LIKE', "%$search%")->paginate(8);
        } else {
            $services = DB::table('services')->orderByDesc('id')->paginate(8);
        }
        return view('admin.services.index', compact('services'));
    }

    public function create() {
        return view('admin.services.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        $service = new Services();
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $image_extension = $photo->extension();
            $image_name = $photo->getClientOriginalName();
            $photo->storeAs('/images/services', $image_name, 'public');
            $service->image = $image_name;
        }
        $service->title = $request->title;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->save();
        session()->flash('message', 'Data berhasil ditambah');
        return redirect(route('admin.service.index'));
    }

    public function delete($id) {
        $service = Services::findOrFail($id);
        Storage::delete('public/images/services/'.$service->image);
        $service->delete();
        session()->flash('message', 'Data berhasil dihapus');
        return redirect(route('admin.service.index'));
    }

    public function edit($id) {
        $service = Services::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required'
        ]);

        $service = Services::findOrFail($id);
        if ($request->hasFile('image')) {
            Storage::delete('public/images/services/'.$service->image);
            $photo = $request->file('image');
            $image_extension = $photo->extension();
            $image_name = $photo->getClientOriginalName();
            $photo->storeAs('/images/services', $image_name, 'public');
            $service->image = $image_name;
        }
        $service->title = $request->title;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->saveOrFail();
        session()->flash('message', 'Data berhasil diupdate');
        return redirect(route('admin.service.index'));
    }
}
