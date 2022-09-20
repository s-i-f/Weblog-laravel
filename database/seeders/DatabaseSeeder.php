<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();
        Role::truncate();

        $user = User::factory(3)->create();
        
        $role = Role::create([
            'name' => 'Author'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::create([
            'name' => 'A post about work',
            'slug' => 'a-post-about-work',
            'category_id' => $work->id,
            'user_id' => $user[0]->id,
            'excerpt' => 'Lorem ipsum dolor sit amet',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'premium' => false
        ]);

        Post::create([
            'name' => 'A personal post',
            'slug' => 'a-personal-post',
            'category_id' => $personal->id,
            'user_id' => $user[2]->id,
            'excerpt' => 'Lorem ipsum dolor sit amet',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'premium' => false
        ]);
    }
}
