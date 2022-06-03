<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Community;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, Community $community)
    {
        $community->posts()->create([
           'user_id' => auth()->id(),
           'title' => $request->title,
           'post_text' => $request->post_text ?? null,
           'post_url' => $request->post_url ?? null,
        ]);

        return redirect()->route('community.show', $community);
    }
}
