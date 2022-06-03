<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Community $community)
    {

        $posts = $community->posts()->latest('id')->paginate(10);
        return view('communities.show', compact('community', 'posts'));
    }
}
