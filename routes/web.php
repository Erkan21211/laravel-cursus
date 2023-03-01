<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// HOME PAGE

Route::get('/', function () {
    return view('posts', [
        // gets all posts and WITH fewer queries + puts the latest at the top
        'posts' => Post::with('category', 'author')->get()->sortBy('published_at')->reverse(),
    ]);
});

// VIEW POST IN DETAIL

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post,
    ]);
});

// VIEW POSTS WITH SAME CATEGORY

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});

// VIEW POSTS WITH SAME AUTHOR

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
});

