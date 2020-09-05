<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminFeedbacksController extends Controller
{
    public function index() {
        $listFeedbacks = DB::table('feedback')->orderByDesc('id')->paginate(5);
        return view('admin.feedbacks.index', compact('listFeedbacks'));
    }
}
