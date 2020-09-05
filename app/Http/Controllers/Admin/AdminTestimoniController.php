<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminTestimoniController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        if (!empty($search)) {
            $listTestimoni = DB::table('testimoni')->orderByDesc('id')->where('name', 'LIKE', "%$search%")->orWhere('job', 'LIKE', "%$search%")->paginate(8);
        } else {
            $listTestimoni = DB::table('testimoni')->orderByDesc('id')->paginate(8);
        }
        return view('admin.testimoni.index', compact('listTestimoni'));
    }

    public function edit($id) {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'status' => 'required'
        ]);
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->status = $request->status;
        $testimoni->saveOrFail();
        session()->flash('message', 'Data berhasil diupdate');
        return redirect(route('admin.testimoni.index'));
    }
}
