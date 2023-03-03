<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            // gets all posts and WITH fewer queries + puts the latest at the top
            'posts' => Post::query()->latest()->filter(
                request(['search', 'category', 'author']))
                ->paginate(6)->withQueryString(),

        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
//$this->getPosts()

//    protected function getPosts()
//    {
//        $posts = Post::with('category', 'author')->latest();
//
//        if (request('search')) {
//            $posts->where('title', 'like', '%' . request('search') . '%')
//                ->orWhere('body', 'like', '%' . request('search') . '%');
//        }
//
//        return $posts->latest()->get();
//    }

}
