<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Community $community, Post $post)
    {
        $this->authorize('ownPost', $post);

        $post->delete();
        return redirect()->route('community.show', [$community])->with('status', 'Deleted!');
    }
}
