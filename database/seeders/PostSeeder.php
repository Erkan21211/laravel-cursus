<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' => 'My fourth post',
            'category_id' => 3,
            'slug' => 'my-fourth-post',
            'excerpt' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
            'body' => '</p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl nec ultricies ultricies, nunc nisl aliquam nisl, eget ali</p>',
            'published_at' => now(),
        ]);
    }
}
