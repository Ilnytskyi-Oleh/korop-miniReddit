<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    public function __invoke(Request $request, Post $post)
    {

        $post->comments()->create([
           'user_id' => auth()->id(),
           'comment_text' => $request->text,
        ]);
        return redirect()->route('post.show', [$post->community, $post]);
    }
}
