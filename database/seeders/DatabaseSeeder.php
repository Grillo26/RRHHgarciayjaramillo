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

        $user2 = new User();
        $user2->name = 'Lorena';
        $user2->email = 'lore@gmail.com';
        $user2->username = 'lore';
        $user2->p_image = public_path('img/profile.png');
        $user2->email_verified_at = now();
        $user2->password =  bcrypt('kuynva26101997');
        $user2->remember_token = Str::random(10);
        $user2->save();

        $user3 = new User();
        $user3->name = 'fabiola';
        $user3->email = 'fabi@gmail.com';
        $user3->username = 'fabi';
        $user3->p_image = public_path('img/profile.png');
        $user3->email_verified_at = now();
        $user3->password =  bcrypt('kuynva26101997');
        $user3->remember_token = Str::random(10);
        $user3->save();
    }
}
