<?php


namespace App\Http\ViewComposer;


use App\Model\Address;
use App\Model\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view) {
        $about = DB::table('about')->select('description')->first();
        $services = DB::table('services')->get();
        $address = Address::first();
        $contactUs = DB::table('contact_us')->first();
        $view->with([
            'about' => $about,
            'address' => $address,
            'services' => $services,
            'contactUs' => $contactUs
        ]);
    }
}
