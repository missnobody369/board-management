<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Settings::create([
            'site_name' => "Board Management Blog",
            'address' => 'Avondale, Auckland New Zealand',
            'contact_number' => '021 089 05197',
            'contact_email' => 'mrcmalubaynz@gmail.com',

        ]);
    }
}
