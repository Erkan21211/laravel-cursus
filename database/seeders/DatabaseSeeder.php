<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // reset the table
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('categories')->truncate();
        DB::table('comments')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $user = User::factory(1)->create([
            'name' => fake()->unique()->name(gender: "male"),
        ])->first();

        $user2 = User::factory(1)->create([
            'name' => fake()->unique()->name(gender: "male"),
        ])->first();

        Post::factory(15)->create([
            'user_id' => $user->id,
        ])->first();

        Post::factory(15)->create([
            'user_id' => $user2->id,
        ])->first();

        Comment::factory(10)->create([
            'post_id' => Post::factory(),
            'user_id' => User::factory(),
        ])->first();

    }
}
