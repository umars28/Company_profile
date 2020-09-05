<?php

use Illuminate\Database\Seeder;
use App\Model\Address;

class AdressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Address::create([
            'adress' => 'Jalan Adhyaksa 1',
            'city' => 'Makassar',
            'province' => 'Sulawesi Selatan',
            'country' => 'Indonesia'
        ]);
    }
}
