<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Community $community, Post $post)
    {
        $post->load('comments.user');

        return view('posts.show', compact('community', 'post'));
    }
}
