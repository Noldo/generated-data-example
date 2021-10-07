<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $fillable = [
        'title',
        'body',
        'user_id',
        'category_id',
    ];

    /**
     * Get the user associated with the post.
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get the category associated with the post.
     */
    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
