<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminSettingController extends Controller
{
    public function index() {
//        $setting = DB::table('setting')->select('key', 'value');
        // select dan pluck beda
//        $setting = Setting::all()->pluck('key', 'value');
        return view('admin.setting.index');
    }

    public function update(Request $request) {
        $updates = $request->all();
        foreach($updates as $key => $value) {
            if($key == 'website_logo' || $key == 'website_favicon' || $key == 'slider_1' || $key == 'slider_2' || $key == 'slider_3' || $key == 'image_login') {
                $file = $request->file($key);
                $filename = $file->getClientOriginalName();
                $file->storeAs('images/setting/', $filename, 'public');
                $value = $filename;
            }
            Setting::where('key',$key)->update(['value' => $value]);
        }
        session()->flash('message', 'Data berhasil diupdate');
        return redirect(route('admin.setting.index'));
    }
}
