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
        $user = App\User::create([
            'name' => 'Omari Sopromadze',
            'email' => 'coma.spurs@gmail.com',
            'password' => bcrypt('coma123'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/user.png',
            'about' => 'lorem ipsum',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
