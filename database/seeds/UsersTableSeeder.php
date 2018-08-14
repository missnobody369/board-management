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
       $user = App\User::create([
            'name' => 'Mae Rachelle Malubay',
            'email' => 'mrcmalubaynz@gmail.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);

        // Create profile for user
        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatar/avatar.jpg',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque odio facere quia! Laboriosam libero ullam eligendi harum alias, velit commodi fugiat doloremque ipsam, corrupti facere? Consequatur necessitatibus excepturi iure nesciunt.',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
