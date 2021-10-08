<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    function getPosts(Request $request) {
        $posts = Post::all();
        return json_encode($posts);
    }
}
