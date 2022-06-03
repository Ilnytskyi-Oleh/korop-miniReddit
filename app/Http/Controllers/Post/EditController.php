<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Community $community, Post $post)
    {
        $this->authorize('ownPost', $post);

        return view('posts.edit', compact('community', 'post'));
    }
}
