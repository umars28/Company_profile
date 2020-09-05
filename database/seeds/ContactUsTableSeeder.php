<?php

use Illuminate\Database\Seeder;
use App\Model\ContactUs;

class ContactUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\ContactUs::create([
            'whatsapp' => '085341770639',
            'facebook' => 'umar_s28',
            'twitter' => 'umar_s28',
            'instagram' => 'umar_s28',
            'linkedin' => 'umar_s28',
            'github' => 'umar_s28',
            'email' => 'umarsabirin369@gmail.com',
            'contact_number' => '085341770639'
        ]);
    }
}
