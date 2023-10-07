<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $imagenPath = public_path('img/profile.png');

        // \App\Models\User::factory(10)->create();
        $user = new User();
        $user->name = 'Carlos Enrique';
        $user->email = 'carlsenrmt26@gmail.com';
        $user->username = 'grillo26';
        $user->p_image = public_path('img/profile.png');
        $user->email_verified_at = now();
        $user->password =  bcrypt('kuynva26101997');
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
