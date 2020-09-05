<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAddressController extends Controller
{
    public function index() {
        $address = DB::table('adress')->first();
        return view('admin.address.index', compact('address'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required'
        ]);
        $address = Address::findOrFail($id);
        $address->adress = $request->address;
        $address->city = $request->city;
        $address->province = $request->province;
        $address->country = $request->country;
        $address->saveOrFail();
        session()->flash('message', 'Data berhasil diupdate');
        return redirect(route('admin.address.index'));
    }
}
