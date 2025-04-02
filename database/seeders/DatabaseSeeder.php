<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $users = User::factory(10)->create();

        // foreach ($users as $user) {
        //     Post::factory(random_int(2, 5))->create([
        //         'user_id' => $user,
        //     ]);
        // }

        [$me] = User::factory(10)->create()->each(function ($user) {
            Post::factory(random_int(2, 5))->create([
                'user_id' => $user,
            ]);
        });

        $me->update([
            'name' => 'me',
            'email' => 'me@exsample.com',
            'password' => Hash::make('password'),
        ]);
    }
}
