<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a new User
        App\User::create([
            'name' => 'Mae Rachelle Malubay',
            'email' => 'mrcmalubaynz@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
