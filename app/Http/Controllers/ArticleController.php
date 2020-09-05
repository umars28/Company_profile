<?php

namespace App\Http\Controllers;

use App\Model\Articles;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function detail(Request $request) {
        $slug = $request->slug;
        $article = Articles::whereSlug($slug)->first();
        $listArticles = Articles::where('id', '!=', $article->id)->orderByDesc('id')->take(3)->get();
        $listCategories = Category::whereStatus('ACTIVE')->get();
        return view('article.detail', compact('article', 'listArticles', 'listCategories'));
    }

    public function index(Request $request) {
        $category = $request->category;
        $listArticleByCategory = DB::table('articles')->where('categories_id', '=', $category)->where('status', '=', 'ACTIVE')->paginate(3);
        $listArticles = Articles::whereStatus('ACTIVE')->take(3)->get();
        $listCategories = Category::whereStatus('ACTIVE')->get();
        return view('article.index', compact('listArticleByCategory', 'listArticles','listCategories'));
    }
}
