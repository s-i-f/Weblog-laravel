<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
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

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'password',
            'is_premium' => true,
            'remember_token' => Str::random(10),
        ]);
        
        User::factory(9)->create();
        Category::factory(15)->create();
        Post::factory(10)->create();
        Comment::factory(10)->create();
    }
}
