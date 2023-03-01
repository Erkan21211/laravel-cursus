<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'published_at',
        'category_id'
    ];

    // make sure the category and author are loaded with the post to avoid N+1 queries
    protected $with = [
        'category',
        'author'
    ];

    // guarded is the opposite of fillable
     protected $guarded = [
         'id'
     ];

     // if a post belongs to a category
     public function category(): BelongsTo
     {
         return $this->belongsTo(Category::class);
     }

     // if a post belongs to a user or written by a user
     public function author(): BelongsTo
     {
         // user_id is the foreign key
         return $this->belongsTo(User::class, 'user_id');
     }

}
