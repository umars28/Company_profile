<?php

use Illuminate\Database\Seeder;
use App\Model\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
            ['key' => 'WEBSITE_TITLE', 'value' => 'Dtech' ],
            ['key' => 'WEBSITE_LOGO', 'value' => 'logo.png'],
            ['key' => 'WEBSITE_FAVICON', 'value' => 'favicon.png'],
            ['key' => 'SLIDER_1', 'value' => 'slider_1.jpg' ],
            ['key' => 'SLIDER_2', 'value' => 'slider_2.jpg' ],
            ['key' => 'SLIDER_3', 'value' => 'slider_3.jpg' ],
            ['key' => 'TEXT_TITLE', 'value' => 'The Best Business Information'],
            ['key' => 'TEXT_DESCRIPTION_1', 'value' => 'We are In The Business Of Helping You Start Your Business'],
            ['key' => 'TEXT_DESCRIPTION_2', 'value' => 'Helping Business Security & Peace of Mind for Your Family'],
            ['key' => 'TEXT_DESCRIPTION_3', 'value' => 'We are In The Business Of Get Quality Business Service'],
            ['key' => 'IMAGE_LOGIN', 'value' => 'bg1.jpg'],
            ['key' => 'IMAGE_LOGIN_CITY', 'value' => 'Bali'],
            ['key' => 'IMAGE_LOGIN_COUNTRY', 'value' => 'Indonesia']
        ]);

    }
}
