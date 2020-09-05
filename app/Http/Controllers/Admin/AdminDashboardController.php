<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Articles;
use App\Model\Portofolio;
use App\Model\Profile;
use App\Model\Testimoni;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class AdminDashboardController extends Controller
{
    public function index() {
        $data['count']['articles'] = Articles::count();
        $data['count']['portofolio'] = Portofolio::count();
        $data['count']['profile'] = Profile::count();
        $data['count']['testimoni'] = Testimoni::count();
        return view('admin.dashboard.index', $data);
    }
}
