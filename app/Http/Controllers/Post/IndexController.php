<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Post;


class IndexController extends Controller
{
    public function __invoke(Community $community)
    {
        return 'test';
        return $community;
//        $communities = Post::all();
//        return view('communities.index', compact('communities'));
    }
}
