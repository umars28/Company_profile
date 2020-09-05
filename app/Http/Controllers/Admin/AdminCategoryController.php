<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller
{
    public function index() {
        $categories = DB::table('category')->orderBy('id', 'DESC')->paginate(8);
        return view('admin.category.index', compact('categories'));
    }

    public function create() {
        return view('admin.category.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'category'  => 'required|unique:category,category',
            'status'    => 'required'
        ]);

        $category = new Category();
        $category->category = $request->category;
        $category->status   = $request->status;
        $category->save();
        session()->flash('message', 'Data berhasil ditambah');
        return redirect(route('admin.category.index'));
    }

    public function delete($id) {
        $category = DB::table('category')->whereId($id)->delete();
        session()->flash('message', 'Data berhasil dihapus');
        return redirect(route('admin.category.index'));
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);
        $this->validate($request, [
            'category' => 'required|unique:category,category,' .$id,
            'status'    => 'required'
        ]);
        $category->category = $request->category;
        $category->status   = $request->status;
        $category->saveOrFail();
        session()->flash('message', 'Data berhasil diupdate');
        return redirect(route('admin.category.index'));
    }
}
