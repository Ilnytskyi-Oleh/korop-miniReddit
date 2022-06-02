<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(StorePostRequest $request)
    {

        $post = Post::create($request->validated() + ['user_id'=> auth()->id()]);
        $post->topics()->attach($request->topics);

        return redirect()->route('post.show', $post);
    }
}
