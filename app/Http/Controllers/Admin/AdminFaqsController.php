<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Faqs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\StaticAnalysis\HappyPath\AssertIsArray\consume;

class AdminFaqsController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        if (!empty($search)) {
            $listFaqs = DB::table('faqs')->orderByDesc('id')->where('question', 'LIKE', "%$search%")->orWhere('answer', 'LIKE', "%$search%")->paginate(5);
            session()->flash('message', 'Hasil pencarian'.' '.$search);
        } else {
            $listFaqs = DB::table('faqs')->orderByDesc('id')->paginate(5);
        }
        return view('admin.faqs.index', compact('listFaqs'));
    }

    public function create() {
        return view('admin.faqs.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
            'status' => 'required'
        ]);
        $faq = new Faqs();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        $faq->save();
        session()->flash('message', 'Data berhasil ditambah');
        return redirect(route('admin.faqs.index'));
    }

    public function delete($id) {
         Faqs::findOrFail($id)->delete();
         session()->flash('message', 'Data berhasil dihapus');
         return redirect(route('admin.faqs.index'));
    }

    public function edit($id) {
        $faq = Faqs::findOrFail($id);
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
            'status' => 'required'
        ]);

        $faq = Faqs::findOrFail($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        $faq->saveOrFail();
        session()->flash('message', 'Data berhasil diupdate');
        return redirect(route('admin.faqs.index'));

    }
}
