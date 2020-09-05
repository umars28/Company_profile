<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Articles;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminArticleController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        if (!empty($search)) {
            $articles = Articles::with('category')->orderByDesc('id')->where('title', 'LIKE', "%$search%")->paginate(8);
        } else {
            $articles = Articles::with('category')->orderByDesc('id')->paginate(8);
        }
        return view('admin.articles.index', compact('articles'));
    }

    protected function create() {
        $categories = DB::table('category')->whereStatus('ACTIVE')->get();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required|unique:articles,slug',
            'status' => 'required',
            'image' => 'required',
            'category' => 'required'
        ]);

        $articles = new Articles();
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $image_extension = $photo->extension();
            $image_name = $photo->getClientOriginalName();
            $photo->storeAs('/images/articles', $image_name, 'public');
            $articles->image = $image_name;
        }
            $articles->title = $request->title;
            $articles->description = $request->description;
            $articles->slug = Str::slug($request->slug);
            $articles->status = $request->status;
            $articles->categories_id = $request->category;
            $articles->saveOrFail();
            session()->flash('message', 'Data berhasil ditambah');
            return redirect(route('admin.article.index'));
        }

        public function delete($id) {
            $article = Articles::findOrFail($id);
            Storage::delete('public/images/articles/'.$article->image);
            $article->delete();
            session()->flash('message', 'Data berhasil dihapus');
            return redirect(route('admin.article.index'));
        }

        public function edit($id) {
            $article = Articles::findOrFail($id);
            $categories = DB::table('category')->whereStatus('ACTIVE')->get();
            return view('admin.articles.edit', compact('article', 'categories'));
        }

        public function update(Request $request, $id) {
            $article = Articles::findOrFail($id);
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'status' => 'required',
                'image' => 'nullable',
                'category' => 'required'
            ]);
            if ($request->hasFile('image')) {
                Storage::delete('public/images/articles/'.$article->image);
                $photo = $request->file('image');
                $image_extension = $photo->extension();
                $image_name = $photo->getClientOriginalName();
                $photo->storeAs('/images/articles', $image_name, 'public');
                $article->image = $image_name;
            }
            $article->title = $request->title;
            $article->description = $request->description;
            $article->status = $request->status;
            $article->categories_id = $request->category;
            $article->saveOrFail();
            session()->flash('message', 'Data berhasil diupdate');
            return redirect(route('admin.article.index'));

        }
}
