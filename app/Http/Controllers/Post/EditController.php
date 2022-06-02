<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Post $post)
    {
        if($post->user_id != auth()->id()){
            abort(403);
        }

        $topics = Topic::all();
        $post->load('topics');
        return view('communities.edit', compact('post', 'topics'));
    }
}
