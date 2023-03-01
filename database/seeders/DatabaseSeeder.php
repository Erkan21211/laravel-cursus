<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // reset the users & catagory & post table
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory(1)->create([
            'name' => fake()->unique()->name(gender: "male"),
        ])->first();

        $user2 = User::factory(1)->create([
            'name' => fake()->unique()->name(gender: "male"),
        ])->first();

        Post::factory(5)->create([
            'user_id' => $user->id,
        ])->first();

        Post::factory(2)->create([
            'user_id' => $user2->id,
        ])->first();






//        $user = User::factory(1)->create()->first();
//
//        $personal = Category::factory(1)->create([
//             'name' => 'Personal',
//             'slug' => 'personal',
//         ])->first();
//
//        $family = Category::factory(1)->create([
//            'name' => 'Family',
//            'slug' => 'family',
//        ])->first();
//
//        $work = Category::factory(1)->create([
//            'name' => 'Work',
//            'slug' => 'work',
//        ])->first();
//
//        Post::factory(1)->create([
//            'user_id' => $user->id,
//            'category_id' => $work->id,
//            'title' => fake()->sentence(),
//            'slug' => fake()->slug(),
//            'excerpt' => '<p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>',
//            'body' => '<p>Mauris id pretium felis. Nam scelerisque sed turpis eget pharetra. Nullam auctor blandit tortor, at scelerisque arcu interdum nec. Donec id scelerisque velit. Vivamus tincidunt tincidunt arcu vel euismod. Vestibulum id ligula dictum, elementum diam vitae, tempor velit. Quisque porttitor quam ac bibendum sodales. Vestibulum neque quam, sagittis sed purus in, commodo aliquet turpis. Sed eu tincidunt ex. Ut laoreet nunc ipsum, a tincidunt leo feugiat vitae. Maecenas venenatis, lectus ac consectetur porta, felis felis sollicitudin ligula, id accumsan libero risus ut elit. Donec iaculis felis nec purus feugiat posuere. Nam tempus, sapien quis vehicula bibendum, nibh enim rhoncus dui, id posuere nibh sem posuere sem. Mauris ac orci placerat, pharetra nulla mattis, porttitor magna. Phasellus sed augue vel lacus rutrum rhoncus. Donec bibendum viverra lacinia.</p>'
//        ])->first();

    }
}
