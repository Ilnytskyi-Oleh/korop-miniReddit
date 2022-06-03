<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Topic;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Community $community)
    {
        return view('posts.create', compact('community'));
    }
}
