<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    function getPosts(Request $request) {
        $posts = Post::where('id', '>', 0)->with('category', 'user')->get();
        return json_encode($posts);
    }
}
