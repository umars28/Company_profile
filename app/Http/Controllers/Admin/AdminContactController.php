<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminContactController extends Controller
{
    public function index() {
        $contact = DB::table('contact_us')->first();
        return view('admin.contact_us.index', compact('contact'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'whatsapp' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
            'github' => 'required',
            'email' => 'required'
        ]);

        $contact = ContactUs::findOrFail($id);
        $contact->whatsapp = $request->whatsapp;
        $contact->facebook = $request->facebook;
        $contact->twitter = $request->twitter;
        $contact->instagram = $request->instagram;
        $contact->linkedin = $request->linkedin;
        $contact->github = $request->github;
        $contact->email = $request->email;
        $contact->saveOrFail();
        session()->flash('message', 'Data berhasil diupdate');
        return redirect(route('admin.contact.index'));
    }
}
