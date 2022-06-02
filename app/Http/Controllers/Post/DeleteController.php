<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        if($post->user_id != auth()->id()){
            abort(403);
        }

        $post->delete();
        return redirect()->route('post.index')->with('status', 'Deleted!');
    }
}
