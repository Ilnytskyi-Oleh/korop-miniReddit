<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Community $community, Post $post)
    {

        $this->authorize('ownPost', $post);

        $post->update($request->validated());

        return redirect()->route('community.show', [$community, $post])->with('status', 'Post updated');
    }
}
