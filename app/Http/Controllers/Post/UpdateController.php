<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdatePostRequest $request, Post $post)
    {
        if($post->user_id != auth()->id()){
            abort(403);
        }
        $post->update($request->validated());
        $post->topics()->sync($request->topics);

        return redirect()->route('post.index');
    }
}
